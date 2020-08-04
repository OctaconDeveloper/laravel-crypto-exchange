<?php

use App\Ballot;
use Illuminate\Support\Facades\Route;

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
Route::get('/401', function () {return view('errors.401');});
Route::get('/403', function () {return view('errors.403');});


Route::get('/user-list', function(){
    return  Ballot::with(['firstcount','secondcount','thirdcount','fourthcount'])->get();
});

Route::get('signout', function () {return 'hello';});

Route::get('user/signup', function () {return view('auth.signup');});
Route::get('user/signin', function () {return view('auth.signin');});
Route::get('user/activation', function () {return view('auth.activation');});
Route::get('user/password-reset', function () {return view('auth.password-reset');});
Route::get('r/{refCode}', function () {return view('auth.signup', ['refCode' => request()->refCode ]);});
Route::get('alltoken/{token}', function () {return view('alltoken');});
Route::get('alltoken', function () {return view('alltoken');});

//User Restricted link

Route::group(['middleware' => ['customer']], function () {
    Route::get('my-wallets', function() {return view('user.mywallets');});
    Route::get('user/profile', function () {return view('user.profile');});
    Route::get('user/referral', function () {return view('user.referral');});
    Route::get('user/wallet-addresses', function () {return view('user.address');});
    Route::get('user/showwallet', function () {return view('user.show_wallet');});
    Route::get('user/verification', function () {return view('user.verification');});
    Route::get('/user/trans/{token}', function () {return view('user.transaction');});


});

Route::group(['prefix' => 'block'], function () {
    //Home
    Route::get('home',function() {return view('admin.home');});

    //Account Views
    Route::get('account/createaccount',function() {return view('admin.account.createaccount');});
    Route::get('account/viewaccount',function() { $accounts = User::with(['user_type','kyc'])->Where('user_type_id','3')->orWhere('user_type_id','4')->get(); return view('admin.account.viewaccount')->with('accounts', $accounts);});
    Route::get('account/accountwallet',function() {return view('admin.account.accountwallet');});
    Route::get('account/zerotrading',function() {return view('admin.account.zerotrading');});
    Route::get('account/blockaccount',function() {return view('admin.account.blockaccount');});
    Route::get('account/accountslog',function() {return view('admin.account.accountslog');});

    //Token Views
    Route::get('tokens/addtoken/{type}',function() {return view('admin.tokens.addtoken');});
    Route::get('tokens/modifytoken/{type}',function() {return view('admin.tokens.modifytoken');});
    Route::get('tokens/edit/{id}',function() {return view('admin.tokens.edittoken');});

    //Market Views
    Route::get('markets/addpair',function() {return view('admin.markets.addpair');});
    Route::get('markets/allpair',function() {return view('admin.markets.allpair');});
    Route::get('markets/market',function() {return view('admin.markets.market');});
    Route::get('markets/settings',function() {return view('admin.markets.settings');});

    //Wallet Views
    Route::get('wallets/viewwallets',function() {return view('admin.wallets.viewwallets');});
    Route::get('wallets/refreshwallets',function() {return view('admin.wallets.refreshwallets');});
    Route::get('wallets/deposits',function() {return view('admin.wallets.deposits');});
    Route::get('wallets/withdrawals',function() {return view('admin.wallets.withdrawals');});

    // KYC Views
    Route::get('kyc/pendingverification',function() {return view('admin.kyc.pendingverification');});
    Route::get('kyc/verifiedaccounts',function() {return view('admin.kyc.verifiedaccounts');});
    Route::get('kyc/viewkyc/{id}', function() { return view('admin.kyc.viewkyc');});

    //Voting Views
    Route::get('voting/newvoting',function() {return view('admin.voting.newvoting');});
    Route::get('voting/modifyvoting',function() {return view('admin.voting.modifyvoting');});

    //Staking views
    Route::get('staking/addstakes',function() {return view('admin.staking.addstakes');});
    Route::get('staking/allstakes',function() {return view('admin.staking.allstakes');});
    Route::get('staking/request',function() {return view('admin.staking.request');});

    //Chat Views
    Route::get('chat/chatroom',function() {return view('admin.chat.chatroom');});
    Route::get('chat/blockuser',function() {return view('admin.chat.blockuser');});

    // Notification Views
    Route::get('notifications/single',function() {return view('admin.notifications.single');});
    Route::get('notifications/multiple',function() {return view('admin.notifications.multiple');});
    Route::get('notifications/logs',function() {return view('admin.notifications.logs');});

    // Setup Views
    Route::get('setup/password',function() {return view('admin.setup.password');});
    Route::get('setup/socialmedia',function() {return view('admin.setup.socialmedia');});
    Route::get('setup/myactivitylog',function() {return view('admin.setup.myactivitylog');});
    Route::get('setup/activitylogs',function() {return view('admin.markets.activitylogs');});


});



Route::namespace('Web')->group(function () {

    Route::post('create-user','AuthController@register');
    Route::post('verify-sigin','AuthController@verify');
    Route::post('activate-user','AuthController@activateUser');
    Route::post('reset-user','AuthController@resetUser');

    //User Restricted Link
    Route::middleware('customer')->group(function () {
        Route::post('password-reset','AuthController@resetPassword');
        Route::post('activate-tfa','AuthController@activateTfa');
        Route::post('add-wallet','WalletController@addWithdrawalAddress');
        Route::get('remove-wallet-addresses/{id}','WalletController@removeWithdrawalAddress');
        Route::post('/user/address-generate','WalletController@newAddress');
        Route::post('/user/request-withdrawal','WalletController@requestWithdrawal');
        Route::get('/user/history','WalletController@listRequest');
        Route::post('add-phone','VerificationController@addPhone');
        Route::post('upload-kyc','VerificationController@uploadKYC');
    });


    //Admin Restricted Link
        Route::post('newuser','AccountController@newaccount');
        Route::post('searchaccount','AccountController@searchaccount');
        Route::post('checkZeroTrade','AccountController@checkZeroTrade');
        Route::post('checkBlocked','AccountController@checkBlocked');
        Route::post('accountlogs','AccountController@accountlogs');
        Route::get('account/zerotrading/{user_id}/{id}','AccountController@changeZeroTradeStatus');
        Route::get('account/zerotrading/{user_id}/{id}','AccountController@changeZeroTradeStatus');
        Route::get('account/blocked/{user_id}/{status}','AccountController@changeBlockStatus');
        Route::post('updatewalletamount','AccountController@updatewalletamount');


        Route::post('addtoken','TokenController@addToken');
        Route::get('delete-token/{token}','TokenController@removeToken');
        Route::post('updatetoken/{token}','TokenController@updatetoken');

        Route::post('newpair','MarketController@newpair');
        Route::get('defaultmarkets/{pair}','MarketController@makedefault');
        Route::get('deletemarkets/{pair}','MarketController@deletepair');
        Route::post('updatetradefee','MarketController@updatetradefee');
        Route::post('checkmarket','MarketController@checkmarket');


        Route::get('withdrawaction/{id}/{status}','WalletController@withdrawaction');
        Route::get('/wallets/generate/{ticker}','WalletController@systemwalletgenerator');


        Route::get('/approvekyc/{id}','VerificationController@approve');

        Route::post('addvote', 'BallotController@store');
        Route::get('deletevoting/{vote}', 'BallotController@delete');

});


