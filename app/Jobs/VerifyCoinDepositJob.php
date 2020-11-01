<?php

namespace App\Jobs;

use App\TradeSetup;
use App\Wallet;
use App\WalletDeposit;
use App\WalletHistory;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;


use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class VerifyCoinDepositJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $trade_mode;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->trade_mode  =  TradeSetup::first()->trade_mode;
       
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //get all coins deposits
        $deposits = WalletDeposit::whereStatus(3)->get();
        foreach($deposits as $deposit)
        {
            if($deposit->ticker === 'BTC')
            {
                $this->processBTC($deposit);
            }
        }
        //get coin deposit status and update accoordingly
    }

    private function HttpClient()
    {
        $headers =  [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
                'X-API-Key' => '1deaf8d383c8f32616180ecea788725e82bc1f5e'
        ];
       return  $this->client = new Client([
            'base_uri' => 'https://api.cryptoapis.io/v1/bc/',
            'headers'  => $headers 
        ]);
    }

    private function processBTC($deposit)
    {
        $result = $this->HttpClient()->get('btc/'.$this->trade_mode.'/txs/basic/txid/'.$deposit->transID);
        $body = json_decode($result->getBody(), true);
        $amount = $body['payload']['amount'];
        $confirmation = $body['payload']['confirmations'];
        if($confirmation === 3)
        {
            //Update  wallet Deposit
            $deposit->update([
                'status' => 4
            ]);

            // Update into wallet_history
            $wallet_history = WalletHistory::where('trackID', $deposit->trackID)->first();
            $wallet_history->update([
                'status' => 4
            ]);

            //get user account balance
            $userWallet = Wallet::where('ticker', $deposit->ticker)->where('user_id',$deposit->user_id)->first();
            $oldBalance = $userWallet->amount;
            $newBalance = $oldBalance + $amount;

            //Update User Account Balance
            $userWallet->update([
                'amount' => $newBalance
            ]);
        }
    }
}
