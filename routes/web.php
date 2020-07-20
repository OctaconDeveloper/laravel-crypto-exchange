<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\WithdrawRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {return view('welcome');});

Route::get('user/signup', function () {return view('auth.signup');});
Route::get('user/signin', function () {return view('auth.signin');});
Route::get('user/activation', function () {return view('auth.activation');});
Route::get('user/password-reset', function () {return view('auth.password-reset');});
Route::get('r/{refCode}', function () {return view('auth.signup', ['refCode' => request()->refCode ]);});
Route::get('alltoken/{token}', function () {return view('alltoken');});
Route::get('alltoken', function () {return view('alltoken');});

//User Restricted link

 Route::get('my-wallets', function() {return view('user.mywallets');});
 Route::get('user/profile', function () {return view('user.profile');});
 Route::get('user/referral', function () {return view('user.referral');});
 Route::get('user/wallet-addresses', function () {return view('user.address');});
 Route::get('user/showwallet', function () {return view('user.show_wallet');});
 Route::get('user/verification', function () {return view('user.verification');});
 Route::get('/user/trans/{token}', function () {return view('user.transaction');});



Route::namespace('Web')->group(function () {

    Route::post('create-user','AuthController@register');
    Route::post('verify-sigin','AuthController@verify');
    Route::post('activate-user','AuthController@activateUser');
    Route::post('reset-user','AuthController@resetUser');

    //User Restricted Link
    Route::post('password-reset','AuthController@resetPassword');
    Route::post('activate-tfa','AuthController@activateTfa');
    Route::post('add-wallet','WalletController@addWithdrawalAddress');
    Route::get('remove-wallet-addresses/{id}','WalletController@removeWithdrawalAddress');
    Route::post('/user/address-generate','WalletController@newAddress');
    Route::post('/user/request-withdrawal','WalletController@requestWithdrawal');
    Route::get('/user/history','WalletController@listRequest');


    Route::post('add-phone','VerificationController@addPhone');
    Route::post('upload-kyc','VerificationController@uploadKYC');

    //User Restricted View



});

Route::get('/users', function () {
    return User::with('user_type')->get();
});

