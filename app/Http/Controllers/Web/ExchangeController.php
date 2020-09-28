<?php

namespace App\Http\Controllers\Web;

use App\Broadcast;
use App\CoinPair;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExchangeController extends Controller
{
    public function index($pair)
    {
        $ticker = CoinPair::wherePair($pair)->first();
        return view('exchange.index', compact('ticker'));
    }

    /**
     * Sing Up Page
     */
    public function signup($refCode=null)
    {
        return $refCode!==null ? view('auth.signup', ['refCode' => request()->refCode ]) : view('auth.signup');
    }

    public function signin()
    {
        return view('auth.signin');
    }

    public function activation()
    {
        return view('auth.activation');
    }

    public function passwordReset()
    {
        return view('auth.password-reset');
    }

    public function alltoken($token=null)
    {
        return view('alltoken');
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function error401()
    {
        return view('errors.401');
    }

    public function error403()
    {
        return view('errors.403');
    }

    public function coinBalance($pair)
    {
        $pair = CoinPair::wherePair($pair)->first();
        return view('exchange.subs.coin_balance', compact('pair'));
    }

    public function orderList($pair, $type)
    {
        $pair = CoinPair::wherePair($pair)->first();
        return view('exchange.subs.list', compact('pair','type'));
    }

    public function coinStat($pair)
    {
        $pair = CoinPair::wherePair($pair)->first();
        return view('exchange.subs.coin_stats', compact('pair'));
    }
    public function coinSearch($pair)
    {
        return view('exchange.subs.coin_search', compact('pair'));
    }

    public function orderGeneral($pair)
    {
        $pair = CoinPair::wherePair($pair)->first();
        return view('exchange.subs.all_trade_history', compact('pair'));
    }

    public function singleGeneral($pair)
    {
        $pair = CoinPair::wherePair($pair)->first();
        return view('exchange.subs.my_history', compact('pair'));
    }

    public function myGeneral($pair)
    {
        $pair = CoinPair::wherePair($pair)->first();
        return view('exchange.subs.my_open', compact('pair'));
    }

    public function orderPanel($pair, $type)
    {
        $pair = CoinPair::wherePair($pair)->first();
        return view('exchange.subs.order_list', compact('pair','type'));
    }

    public function chat()
    {
        return view('exchange.subs.chats.chat_main');
    }

    public function chatRoom()
    {
        return view('exchange.subs.chats.chat_body');
    }

    public function chatSend()
    {
        return view('exchange.subs.chats.chat_footer');
    }

    public function news()
    {
        return view('exchange.subs.news');
    }
    
    public function newsSingle($slug)
    {
        $name = str_replace("-"," ", $slug);
        $news = Broadcast::where('title', $name)->first();
        return view('exchange.subs.single_news', compact('news'));
    }


}

