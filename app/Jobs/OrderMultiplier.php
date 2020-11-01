<?php

namespace App\Jobs;

use App\MarketMaker;
use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class OrderMultiplier implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $market = MarketMaker::inRandomOrder()->first();
        if($market)
        {
            $pair = $market->pair;
            $max = $market->maximum_volume;
            $min = 0;
            $value = ($min + lcg_value()*(abs($max - $min)));
            $currency = explode("_",$pair)[1];
            $price = sprintf("%0.7f",$value);
            $amount = sprintf("%0.7f",(0.0005 + lcg_value()*(abs(4.5000 - 0.0005))));
            $randomType = [
                'buy',
                'sell'
            ];
            $type = $randomType[array_rand($randomType)];
            if($type=='buy'){
                $image = env('APP_URL').'/v3/ic_buy.svg';
            }else{
                $image = env('APP_URL').'/v3/ic_sell.svg';
            }
        
            Order::create([
                'user_id' => sprintf("%0.3s",rand(1,40) * time()) ,
                'pair' => $pair ,
                'currency' => $currency ,
                'type' => $type,
                'image' => $image,
                'price' => $price ,
                'amount' => $amount,
                'stat' => 1 ,
            ]);
        }

    }
}
