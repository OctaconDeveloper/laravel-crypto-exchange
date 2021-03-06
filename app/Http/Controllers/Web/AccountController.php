<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Jobs\CreateUserWalletJob;
use App\Log;
use App\Mail\NewAccount;
use App\ReferalBalance;
use App\Token;
use App\TradeSetup;
use App\User;
use App\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use PragmaRX\Google2FA\Google2FA;

class AccountController extends Controller
{

    public function newaccount()
    {
        $this->newaccountValidator();
        $referal = null;

        $google2fa = new Google2FA();
        $rt = rand(40,5000) * time();
        $tr = str_shuffle('ABCDEFGHIJK');
        $refCode = sprintf("%0.7s", str_shuffle($rt.$tr));
        $activation_code = sprintf("%0.6s", str_shuffle($rt));
        $wallet_id = 'SUW-'.sprintf("%0.6s", str_shuffle($rt));
        $secret = $google2fa->generateSecretKey();
        $qrcode_url = $google2fa->getQRCodeUrl(
            config('app.name'),
            request()->email,
            $secret
        );
        $password = Str::random(10);
        $location = [
            1 => '/block/home',
            2 => '/block/home',
            3 => '/block/home',
            4 => '/my-wallets',
            5 => '/'
        ];
        //Save User
        $user = User::create([
            'user_type_id' => request()->account_type,
            'email' => request()->email,
            'password' => Hash::make($password),
            'referral' => $referal,
            'refCode' => $refCode,
            'secret' => $secret,
            'qrcode_url' => $qrcode_url,
            'tfa_stat' => 0,
            'wallet_id' => $wallet_id,
            'location' => $location[request()->account_type],
            'activation_code' => $activation_code
        ]);
 
        //Save Referral Detail
        if(request()->account_type === 4){
            ReferalBalance::create([
                'user_id' => $user->id,
                'amount' => '0',
                'currency' => 'BTC'
            ]); 
        }

        //Generate Wallet Address
        CreateUserWalletJob::dispatch($user);


        // Send Activation Mail
        Mail::to(request()->email)->send(new NewAccount($user,$password));
        $msg = "New  Account Details Sent to ".request()->email;
        return redirect()->back()->with('msg', $msg);
    }

    public function newadmin()
    {
        $this->newaccountValidator();
        $referal = null;

        $google2fa = new Google2FA();
        $rt = rand(40,5000) * time();
        $tr = str_shuffle('ABCDEFGHIJK');
        $refCode = sprintf("%0.7s", str_shuffle($rt.$tr));
        $activation_code = sprintf("%0.6s", str_shuffle($rt));
        $wallet_id = 'ADM-'.sprintf("%0.6s", str_shuffle($rt));
        $secret = $google2fa->generateSecretKey();
        $qrcode_url = $google2fa->getQRCodeUrl(
            config('app.name'),
            request()->email,
            $secret
        );
        $password = Str::random(10);
        $location = [
            1 => '/block/home',
            2 => '/block/home',
            3 => '/block/home',
            4 => '/my-wallets',
            5 => '/'
        ];
        $user = User::create([
            'user_type_id' => request()->account_type,
            'email' => request()->email,
            'password' => Hash::make($password),
            'referral' => $referal,
            'refCode' => $refCode,
            'secret' => $secret,
            'qrcode_url' => $qrcode_url,
            'tfa_stat' => 0,
            'wallet_id' => $wallet_id,
            'location' => $location[request()->account_type],
            'activation_code' => $activation_code,
            'is_active' => 1
        ]);
        // Send Activation Mail
        Mail::to(request()->email)->send(new NewAccount($user,$password));
        $msg = "New  Account Details Sent to ".request()->email;
        return redirect()->back()->with('msg', $msg);
    }

    private function newaccountValidator()
    {
        return request()->validate(
            [
                'email' => 'required|email|unique:users,email',
                'account_type' => 'required|numeric|exists:user_types,id'
            ]
        );
    }

    public function searchaccount()
    {
        request()->validate([
            'email' => 'required|email|exists:users,email'
        ]);
        $usr = User::whereEmail(request()->email)->where('user_type_id','>','3')->exists();
        if($usr){
            $user = User::whereEmail(request()->email)->where('user_type_id','>','3')->first();
            $accounts =  Wallet::with('user')->whereUserId($user->id)->get();
            return redirect()->back()->with('accounts',$accounts);
        }else{
            $error = "No user account found";
            return redirect()->back()->withErrors([$error]);
        }
    }

    public function checkZeroTrade()
    {
        request()->validate([
            'email' => 'required|email|exists:users,email'
        ]);
        $usr = User::whereEmail(request()->email)->where('user_type_id','>','3')->exists();
        if($usr){
            $zeros = User::whereEmail(request()->email)->first();
            return redirect()->back()->with('zeros',$zeros);
        }else{
            $error = "No user account found";
            return redirect()->back()->withErrors([$error]);
        }

    }

    public function changeZeroTradeStatus(User $user_id, $id)
    {
        $user_id->update(
            [
                'tradeStat' => $id
            ]
        );
        $zeros = User::whereEmail(request()->email)->first();
        Log::create(
            [
                'user_id' => auth()->user()->id,
                'log' => ' change zero trading status for '.$user_id->email
            ]
        );
        return redirect()->back()->with('zeros',$user_id);
    }

    public function checkBlocked()
    {
        request()->validate([
            'email' => 'required|email|exists:users,email'
        ]);
        $usr = User::whereEmail(request()->email)->where('user_type_id','>','3')->exists();
        if($usr){
            $blocked = User::where('is_active','!=','0')->whereEmail(request()->email)->where('user_type_id', '>' ,' 3')->first();
            return redirect()->back()->with('blocked',$blocked);
        }else{
            $error = "No user account found";
            return redirect()->back()->withErrors([$error]);
        }
    }

    public function changeBlockStatus(User $user_id, $status)
    {
        $array = [
            'open' => 1,
            'close' => 2
        ];
        $id = $array[$status];
        $user_id->update([
            'is_active' => $id
        ]);
        Log::create(
            [
                'user_id' => auth()->user()->id,
                'log' => ' change user block status '.$user_id->email
            ]
        );
        return redirect()->back()->with('blocked',$user_id);
    }

    public function changeAdminBlockStatus(User $user_id, $status)
    {
        $array = [
            'open' => 1,
            'close' => 2
        ];
        $id = $array[$status];
        $user_id->update([
            'is_active' => $id
        ]);
        Log::create(
            [
                'user_id' => auth()->user()->id,
                'log' => ' change user block status '.$user_id->email
            ]
        );
        return redirect()->back()->with('msg','Success');
    }

    public function accountlogs()
    {
        request()->validate([
            'email' => 'required|email|exists:users,email'
        ]);
        $usr = User::whereEmail(request()->email)->where('user_type_id','>','3')->exists();
        if($usr){
            $user = User::whereEmail(request()->email)->first();
            $logs = Log::with('user')->whereUserId($user->id)->get();
            return redirect()->back()->with('logs',$logs);
        }else{
            $error = "No user account found";
            return redirect()->back()->withErrors([$error]);
        }
    }

    public function adminaccountlogs()
    {
        request()->validate([
            'email' => 'required|email|exists:users,email'
        ]);
        $usr = User::whereEmail(request()->email)->where('user_type_id','<','4')->exists();
        if($usr){
            $user = User::whereEmail(request()->email)->first();
            $logs = Log::with('user')->whereUserId($user->id)->get();
            return redirect()->back()->with('logs',$logs);
        }else{
            $error = "No admin account found";
            return redirect()->back()->withErrors([$error]);
        }
    }

    public function updatewalletamount()
    {
        $id = request()->id;
        $balance = request()->balance;
        $account = Wallet::findorFail($id);
        $user = User::find($account->user_id);
        $account->update([
            'amount' => $balance
        ]);
        Log::create(
            [
                'user_id' => auth()->user()->id,
                'log' => ' update '.$user->email.' '.$account->ticker.' wallet  amount. new balance is '.$balance
            ]
        );
    }

    private function createAddress($coin_type,$coin_base, $trade_mode, $user)
    {
        if($coin_type == 'BTC'){
            $api = 'https://api.cryptoapis.io/v1/bc/'.strtolower($coin_type).'/'.$trade_mode.'/address';

        }else{
            if($coin_type == 'ETH' && $trade_mode == 'mainnet'){
                $api = 'https://api.cryptoapis.io/v1/bc/'.strtolower($coin_type).'/'.$trade_mode.'/address';
            }else{
                $api = 'https://api.cryptoapis.io/v1/bc/'.strtolower($coin_type).'/ropsten/address';
            }
        }
        $response = new Http();

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'X-API-Key' => '1deaf8d383c8f32616180ecea788725e82bc1f5e'
        ])->post($api);
        $res = json_decode($response, true);
        $user_wallet = Wallet::create([
            'user_id' => $user->id,
            'address' => $res['payload']['address'],
            'privateKey' => $res['payload']['privateKey'],
            'publicKey' => $res['payload']['publicKey'],
            'ticker' => $coin_type,
            'base' => $coin_base,
            'amount' => 0,
            'status' => 0
        ]);

        Log::create(
            [
                'user_id' => $user->id,
                'log' => 'created new address for '.$coin_type
            ]
        );
        return $user_wallet->address;
    }

}
