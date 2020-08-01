<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Log;
use App\Mail\NewAccount;
use App\ReferalBalance;
use App\User;
use App\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
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
            'activation_code' => $activation_code
        ]);
        if(request()->account_type === 3){
            ReferalBalance::create([
                'user_id' => $user->id,
                'amount' => '0',
                'currency' => 'BTC'
            ]);
        }
        // Send Activation Mail
        Mail::to(request()->email)->send(new NewAccount($user,$password));
        $msg = "New  Account Details Sent to ".request()->email;
        return redirect('/block/account/createaccount')->with('msg', $msg);
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
        $user = User::whereEmail(request()->email)->first();
        $accounts =  Wallet::with('user')->whereUserId($user->id)->get();
        return redirect('/block/account/accountwallet')->with('accounts',$accounts);
    }

    public function checkZeroTrade()
    {
        request()->validate([
            'email' => 'required|email|exists:users,email'
        ]);
        $zeros = User::whereEmail(request()->email)->first();
        return redirect('/block/account/zerotrading')->with('zeros',$zeros);

    }

    public function changeZeroTradeStatus(User $user_id, $id)
    {
        $user_id->update(
            [
                'tradeStat' => $id
            ]
        );
        $zeros = User::whereEmail(request()->email)->first();
        return redirect('/block/account/zerotrading')->with('zeros',$user_id);
    }

    public function checkBlocked()
    {
        request()->validate([
            'email' => 'required|email|exists:users,email'
        ]);
        $blocked = User::where('is_active','!=','0')->whereEmail(request()->email)->first();
        return redirect('/block/account/blockaccount')->with('blocked',$blocked);
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
        return redirect('/block/account/blockaccount')->with('blocked',$user_id);
    }

    public function accountlogs()
    {
        request()->validate([
            'email' => 'required|email|exists:users,email'
        ]);
        $user = User::whereEmail(request()->email)->first();
        $logs = Log::with('user')->whereUserId($user->id)->get();
        return redirect('/block/account/accountslog')->with('logs',$logs);
    }
}
