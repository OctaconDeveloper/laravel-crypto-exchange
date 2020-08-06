<?php

namespace App\Http\Controllers\Web;

use App\CoinPair;
use App\Http\Controllers\Controller;
use App\Market;
use App\TradeSetup;
use App\Log;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    public function newpair()
    {
        request()->validate([
            'target_coin' => 'required|string',
            'base_coin' => 'required|string'
        ]);
        if(request()->target_coin == request()->base_coin){
            $error = "can't pair same coins together";
            return redirect('/block/markets/addpair')->withErrors([$error]);
        }
            $isValid = CoinPair::whereTargetId(request()->target_coin)->whereBaseId(request()->base_coin)->exists();
            if($isValid){
                $error = 'Market pair for '.request()->target_coin.' and '.request()->base_coin.' already captured';
                return redirect('/block/markets/addpair')->withErrors([$error]);
            }

                $pair = request()->target_coin.'_'.request()->base_coin;
                CoinPair::create([
                    'pair' => $pair,
                    'target_id' => request()->target_coin,
                    'base_id' => request()->base_coin,
                    'stat' => 0
                ]);
                Log::create(
                    [
                        'user_id' => auth()->user()->id,
                        'log' => ' Added new coin market pair'
                    ]
                );
                $msg = "Pair added successfully";
                return redirect('/block/markets/addpair')->with('msg',$msg);
    }


    public function makedefault(CoinPair $pair)
    {
        CoinPair::where('stat', 1)
       ->update(['stat' => 0]);
       $pair->update(['stat' => 1]);
       Log::create(
        [
            'user_id' => auth()->user()->id,
            'log' => ' Make new coin market pair default'
        ]
    );
       return redirect('/block/markets/allpair');

    }

    public function deletepair(CoinPair $pair)
    {
       $pair->delete();
       Log::create(
            [
                'user_id' => auth()->user()->id,
                'log' => ' Delete coin market pair'
            ]
        );
       return redirect('/block/markets/allpair');

    }

    public function updatetradefee()
    {
        request()->validate([
            'trade_fee' => 'required|numeric|between:0,99.99'
        ]);
        TradeSetup::updateOrCreate(
            [
                'id' => 1
            ],
            [
                'trade_fee' => request()->trade_fee,
                'trade_mode' => request()->trade_mode
            ]
        );
        Log::create(
            [
                'user_id' => auth()->user()->id,
                'log' => ' Updated trade setting'
            ]
        );
        $msg = "Trade Settings Updated";
        return redirect('/block/markets/settings')->with('msg',$msg);
    }

    public function checkmarket()
    {
        request()->validate([
            'market_ticker' => 'required|string'
        ]);

        $markets = Market::with('user')->wherePair(request()->market_ticker)->get();
        return redirect('/block/markets/market')->with('markets',$markets);
    }
}
