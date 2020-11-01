<?php

namespace App\Jobs;

use App\Chat;
use App\Token;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RobotChat implements ShouldQueue
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
        $coinlog =  Token::where('ticker','!=','BTC')
        ->where('ticker','!=','ETH')
        ->where('ticker','!=','USDT')
        ->inRandomOrder()
        ->first();

        $messageArray = [
            'is pumping','buy now',
            'hodl','to moon',
            'moon','pump now',
            'is mind blowing','is two days to moon',
            'is rocketting','to the sky','hippie'
        ];
        $nameArray = [
            'cryptoLord','darknight','torino',
            'hodlking','danieell','btcguru33',
            'manito','sackie','plaikn','buer','whaleking'
        ];
        $msg = $coinlog->ticker.' '.$messageArray[array_rand($messageArray)];
        $data =  Chat::create([
            'user_id' => 0,
            'name' => $nameArray[array_rand($nameArray)],
            'stat' => '1',
            'message' => $msg
        ]);
    }
}
