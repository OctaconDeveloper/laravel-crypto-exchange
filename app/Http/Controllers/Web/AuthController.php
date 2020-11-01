<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Jobs\CreateUserWalletJob;
use App\User;
use App\Log;
use App\ReferalBalance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ActivationMail;
use App\Mail\PasswordReset;
use App\Mail\PasswordChange;
use App\Mail\TFAEnabled;
use App\Token;
use App\TradeSetup;
use App\Wallet;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use PragmaRX\Google2FA\Google2FA;

//is_active => 0-> inactive:: 1->active:: 2-> block


class AuthController extends Controller
{

    public function verify()
    {
        $this->loginVerify();

        $user = request()->only('email','password');

       return $this->login($user);
    }

    public function register()
    {
        $this->registerVerify(); 
        $user_type_id = 4;

        $referal = request()->referral ? request()->referral : null;

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
        $user = User::create([
            'user_type_id' => $user_type_id,
            'email' => request()->email,
            'password' => Hash::make(request()->password),
            'referral' => $referal,
            'refCode' => $refCode,
            'secret' => $secret,
            'qrcode_url' => $qrcode_url,
            'tfa_stat' => 0,
            'wallet_id' => $wallet_id,
            'location' => '/my-wallets',
            'activation_code' => $activation_code
        ]);
        ReferalBalance::create([
            'user_id' => $user->id,
            'amount' => '0',
            'currency' => 'BTC'
        ]);
        
        //CreateWallet
            CreateUserWalletJob::dispatch($user);
        // $trade_mode = TradeSetup::first()->trade_mode;
        // $alltokens = Token::all();
        // $cok = [];
        // foreach($alltokens as $token)
        // {
        //     $coin_type = $token->ticker;
        //     $coin_base = $token->base; 
        //     $data = $this->createAddress($coin_type,$coin_base,$trade_mode, $user);
        //     $cok[] = $data;
        // }

        // return $cok;

        //Send Activation Mail
        Mail::to(request()->email)->send(new ActivationMail($user));
        $msg = "Activation Code sent to ".request()->email;
		return redirect('/user/signin')->with('msg', $msg);
    }


    private function loginVerify()
    {
        return request()->validate([
            'email'=> 'required|email',
            'password' => 'required',
            'tfa_code' => 'nullable|numeric'
        ]);
    }

    private function registerVerify()
    {
        return request()->validate([
            'email'=> 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'referral' => 'nullable'
        ]);
    }

    private function login($user)
    {

		if(Auth::attempt($user)){
            $user_detail = User::whereEmail(request()->email)->first();
            if($user_detail->is_active == 1){
                $page = $user_detail->location;
                    return redirect($page);
                Log::create(
                    [
                        'user_id' => $user_detail->id,
                        'log' => 'logged in'
                    ]
                );
            }else if($user_detail->is_active == 2){
                $error = "Account is blocked";
                return redirect('/user/signin')->withErrors([$error]);

            }else{
                $error = "Account is not verified";
                return redirect('/user/signin')->withErrors([$error]);
            }
		}
		$error = "Invalid Login Credentials";
		return redirect('/user/signin')->withErrors([$error]);
    }


    public function activateUser()
    {
        $this->verifyActivation();
        $status = User::whereEmail(request()->email)
                    ->whereActivationCode(request()->activation_code)
                    ->exists();
        if($status){
            $user = User::whereEmail(request()->email)
                        ->whereActivationCode(request()->activation_code)
                        ->first();
            $user->update([
                'is_active' => 1
            ]);
            Log::create(
                [
                    'user_id' => $user->id,
                    'log' => ' activated account'
                ]
            );
            $msg = "Account activated successfully, login to proceed ";
            return redirect('/user/signin')->with('msg', $msg);
        }else{
            $error = "Invalid Activation Code";
            return redirect('/user/activation')->withErrors([$error]);
        }
    }

    private function verifyActivation()
    {
        return request()->validate([
            'email' => 'required|email|exists:users,email',
            'activation_code' => 'required|exists:users,activation_code'
        ]);
    }

    public function resetUser()
    {
        $this->verifyRest();
        $user = User::where('email', request()->email)->first();

        if (!$user)
        return redirect('/user/password-reset')->withErrors(["No record found for ".request()->email]);

        DB::table('password_resets')->insert([
            'email' => request()->email,
            'token' => mt_rand(100000, 999999),
            'created_at' => Carbon::now()
        ]);

        $tokenData = DB::table('password_resets')
                        ->where('email', request()->email)
                        ->latest()
                        ->first();

        // send email to user

                    Log::create(
                        [
                            'user_id' => $user->id,
                            'log' => 'reset account details'
                        ]
                    );
            Mail::to(request()->email)->send(new PasswordReset($tokenData));
            $msg = "Password reset code sent to ".request()->email;
            return redirect('/user/password-reset')->with('msg', $msg);
    }

    private function verifyRest()
    {
        return request()->validate([
            'email' => 'required|email|exists:users,email',
        ]);
    }

    public function resetPassword()
    {
        $this->verifyPass();
        $user = User::find(auth()->user()->id);
        $user->update([
            'password' => Hash::make(request()->password),
        ]);

        Log::create(
            [
                'user_id' => $user->id,
                'log' => 'reset account password'
            ]
        );
        Mail::to(auth()->user()->email)->send(new PasswordChange($user));
        $msg = "Activation Code sent to ".auth()->user()->email;
		return redirect('/user/profile')->with('msg', $msg);
    }

    public function resetPasswordAdmin()
    {
        $this->verifyPass();
        $user = User::find(auth()->user()->id);
        $user->update([
            'password' => Hash::make(request()->password),
        ]);

        Log::create(
            [
                'user_id' => $user->id,
                'log' => 'reset account password'
            ]
        );
        Mail::to(auth()->user()->email)->send(new PasswordChange($user));
        $msg = "Password update message to ".auth()->user()->email;
		return redirect('/block/setup/password')->with('msg', $msg);
    }

    private function verifyPass()
    {
        return request()->validate([
            'password' => 'required|confirmed|min:6',
        ]);
    }

    public function activateTfa()
    {
        $this->verifyInput();

        $google2fa = new Google2FA();
        $user  = User::find(auth()->user()->id);
        $valid = $google2fa->verifyKey($user->secret,request()->tfa_code);
        if(!$valid){
            return redirect('/user/password-reset')->withErrors(["Incorrect TFA Code"]);
        }
        $user->update([
            'tfa_stat' => 1
        ]);
        Log::create(
            [
                'user_id' => $user->id,
                'log' => 'activate two factor authentication'
            ]
        );
        Mail::to(auth()->user()->email)->send(new TFAEnabled($user));
        $msg = "TFA enabled for ".auth()->user()->email;
		return redirect('/user/profile')->with('msg', $msg);
    }

    private function verifyInput()
    {
        return request()->validate([
            'tfa_code' => 'required|numeric'
        ]);
    }

    public function signout()
    {
        Auth::logout();
        return redirect('/user/signin');
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
