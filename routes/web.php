<?php

use App\Http\Controllers\Web\ChatController;
use App\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\ExchangeController;
use App\Http\Controllers\Web\OrderController;

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


Route::get('/user-list/{pair}', [OrderController::class, 'graphData']);



    /**
     * Exchange URLs
     */
    Route::namespace('Web')->group(function () {
        Route::get('market/{pair}', [ExchangeController::class, 'index']);

        Route::get('user/signup', [ExchangeController::class, 'signup']);
        Route::get('user/signin', [ExchangeController::class, 'signin']);
        Route::get('user/activation', [ExchangeController::class, 'activation']);
        Route::get('user/password-reset', [ExchangeController::class, 'passwordReset']);
        Route::get('r/{refCode}', [ExchangeController::class, 'signup']);
        Route::get('alltoken/{token}', [ExchangeController::class, 'alltoken']);
        Route::get('alltoken', [ExchangeController::class, 'alltoken']);
        Route::get('/', [ExchangeController::class, 'welcome']);
        Route::get('/401', [ExchangeController::class, 'error401']);
        Route::get('/403', [ExchangeController::class, 'error403']);
 

        Route::get('/graph_book/{pair}', [ExchangeController::class, 'graphBook']);
        Route::get('/coin_balance/{pair}', [ExchangeController::class, 'coinBalance']);
        Route::get('/order/panel/{pair}/{type}', [ExchangeController::class, 'orderList']);
        Route::get('/coinstat/{pair}', [ExchangeController::class, 'coinStat']);
        Route::get('/coin_search/{pair}', [ExchangeController::class, 'coinSearch']);

        Route::post('/sell_logic', [OrderController::class, 'sellLogic']);
        Route::post('/buy_logic', [OrderController::class, 'buyLogic']);

        Route::get('/orderlog/general/{pair}', [ExchangeController::class, 'orderGeneral']);
        Route::get('/orderlog/single/{pair}', [ExchangeController::class, 'singleGeneral']);
        Route::get('/orderlog/open/{pair}', [ExchangeController::class, 'myGeneral']);


        Route::get('/orders/list/{pair}/{type}', [ExchangeController::class, 'orderPanel']);
        Route::get('/chats/chat', [ExchangeController::class, 'chat']);
        Route::get('/chats/room', [ExchangeController::class, 'chatRoom']);
        Route::get('/chats/send', [ExchangeController::class, 'chatSend']);
        Route::post('/save-chat', [ChatController::class, 'saveChat']);
        Route::post('/save-chat-name', [ChatController::class, 'saveChatName']);
        Route::post('/delete-order-id', [OrderController::class, 'deleteOrder']);

    });






//User Restricted link

Route::group(['middleware' => ['customer']], function ()
{
    Route::get('my-wallets', function() {return view('user.mywallets');});
    Route::get('user/profile', function () {return view('user.profile');});
    Route::get('user/referral', function () {return view('user.referral');});
    Route::get('user/wallet-addresses', function () {return view('user.address');});
    Route::get('user/showwallet', function () {return view('user.show_wallet');});
    Route::get('user/verification', function () {return view('user.verification');});
    Route::get('/user/trans/{token}', function () {return view('user.transaction');});


});

Route::group(['prefix' => 'block', 'middleware' => 'superAdmin'], function ()
{
    //Home
    Route::get('home',function() {return view('admin.home');});

    //Account Views
    Route::get('account/createaccount',function() {return view('admin.account.createaccount');});
    Route::get('account/viewaccount',function() { $accounts = User::with(['user_type','kyc'])->Where('user_type_id', '>','3')->get(); return view('admin.account.viewaccount')->with('accounts', $accounts);});
    Route::get('account/accountwallet',function() {return view('admin.account.accountwallet');});
    Route::get('account/zerotrading',function() {return view('admin.account.zerotrading');});
    Route::get('account/blockaccount',function() {return view('admin.account.blockaccount');});
    Route::get('account/accountslog',function() {return view('admin.account.accountslog');});

    //Admin User Views
    Route::get('admin/createaccount',function() {return view('admin.user.createaccount');});
    Route::get('admin/viewaccount',function() { $accounts = User::with(['user_type','kyc'])->Where('user_type_id', '<','4')->get(); return view('admin.user.viewaccount')->with('accounts', $accounts);});
    Route::get('admin/accountslog',function() {return view('admin.user.accountslog');});

    //Token Views
    Route::get('tokens/addtoken/{type}',function() {return view('admin.tokens.addtoken');});
    Route::get('tokens/modifytoken/{type}',function() {return view('admin.tokens.modifytoken');});
    Route::get('tokens/edit/{id}',function() {return view('admin.tokens.edittoken');});

    //Market Views
    Route::get('markets/addpair',function() {return view('admin.markets.addpair');});
    Route::get('markets/allpair',function() {return view('admin.markets.allpair');});
    Route::get('markets/market',function() {return view('admin.markets.market');});
    Route::get('markets/history',function() {return view('admin.markets.history');});
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
    Route::get('voting/listing',function() {return view('admin.voting.listing');});

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
    Route::get('notifications/broadcast',function() {return view('admin.notifications.broadcast');});

    // Setup Views
    Route::get('setup/password',function() {return view('admin.setup.password');});
    Route::get('setup/socialmedia',function() {return view('admin.setup.socialmedia');});
    Route::get('setup/myactivitylog',function() {return view('admin.setup.myactivitylog');});
    Route::get('setup/activitylogs',function() {return view('admin.setup.activitylogs');});
    Route::get('setup/faq',function() {return view('admin.setup.faq');});


});



Route::namespace('Web')->group(function () {

    Route::post('create-user','AuthController@register');
    Route::post('verify-sigin','AuthController@verify');
    Route::post('activate-user','AuthController@activateUser');
    Route::post('reset-user','AuthController@resetUser');
    Route::get('signout','AuthController@signout');
    Route::get('news','ExchangeController@news');
    Route::get('news/{slug}','ExchangeController@newsSingle');

    Route::get('graph-data/{pair}', [OrderController::class, 'graphData']);
    //User Restricted Link
    Route::middleware('customer')->group(function () 
    {
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


    //Admin Restricted Link 'middleware' => ''
    Route::middleware('superAdmin')->group(function () 
    {
        Route::post('newuser','AccountController@newaccount');
        Route::post('newadmin','AccountController@newadmin');
        Route::post('searchaccount','AccountController@searchaccount');
        Route::post('checkZeroTrade','AccountController@checkZeroTrade');
        Route::post('checkBlocked','AccountController@checkBlocked');
        Route::post('accountlogs','AccountController@accountlogs');
        Route::post('adminaccountlogs','AccountController@adminaccountlogs');
        Route::get('account/zerotrading/{user_id}/{id}','AccountController@changeZeroTradeStatus');
        Route::get('account/zerotrading/{user_id}/{id}','AccountController@changeZeroTradeStatus');
        Route::get('account/blocked/{user_id}/{status}','AccountController@changeBlockStatus');
        Route::get('admin/blocked/{user_id}/{status}','AccountController@changeAdminBlockStatus');
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
        Route::post('savestake', 'StakingController@store');
        Route::get('deletestake/{stake}', 'StakingController@delete');
        Route::post('getchatuser', 'ChatController@getUser');
        Route::get('/chatblock/{chat}/{status}','ChatController@blockUser');
        Route::post('singlenotification', 'NotificationController@single');
        Route::post('multiplenotification', 'NotificationController@multiple');
        Route::post('savemedia', 'NotificationController@savemedia');
        Route::post('password-reset','AuthController@resetPasswordAdmin');
        Route::get('deletefaq/{faq}','FAQController@deleteFAQ');
        Route::post('addfaq','FAQController@addfaq');
        Route::post('addmaker','MarketController@storemaker');
        Route::get('deletemark/{id}','MarketController@deleteMarker');
        Route::post('addcoinlisting','BallotController@addtoken');
        Route::get('deletecoinlist/{id}','BallotController@deletetoken');
        Route::post('updatecoinlisting/{id}', 'BallotController@updatetoken');
        Route::post('broadcastnotification','NotificationController@sendBroadcast');
    });

});


