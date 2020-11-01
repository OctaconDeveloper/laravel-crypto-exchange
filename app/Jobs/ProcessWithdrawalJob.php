<?php

namespace App\Jobs;

use App\SystemWallet;
use App\TradeSetup;
use App\WalletHistory;
use App\WithdrawRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class ProcessWithdrawalJob implements ShouldQueue
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
        $this->trade_mode = TradeSetup::first()->trade_mode;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //Get Approved WIthdrawals
        $withdrawals = WithdrawRequest::whereStatus('2')->get();

        // loop through all requests
        foreach($withdrawals as $withdrawal)
        {
            // sign transaction and send 
            if($withdrawal->ticker === 'BTC')
            {
                $transID = $this->processWithdrawBTC($withdrawal);
            }
            else if($withdrawal->ticker === 'ETH')
            {
                $transID = $this->processWithdrawETH($withdrawal);
            }
            else
            {
                $transID = $this->processWithdrawToken($withdrawal);
            }
            if($transID)
            {
                $status = 3;
                // update walletRequest with transaction ID and status of 3
                $this->updateRequest($withdrawal->id, $status, $transID);

                // update wallet history and status of 3 via trackID
                $this->updateWalletHistory($withdrawal->trackID, $status, $transID);
            }
        }
    }

    private function updateRequest($id, $status, $transID)
    {
        $data = WithdrawRequest::find($id);
        $data->update([
            'status' => $status,
            'transID' => $transID
        ]);
    } 
    
    private function updateWalletHistory($trackID, $status, $transID)
    {
        $data = WalletHistory::where('trackID',$trackID)->first();
        $data->update([
            'status' => $status,
            'transID' => $transID
        ]);
    }
 
    private function processWithdrawBTC($data)
    {
        $baseWallet =  SystemWallet::whereTicker('BTC')->first();

        if($baseWallet->amount > $data->amount)
        {
            $api = 'https://api.cryptoapis.io/v1/bc/btc/'.$this->trade_mode.'/txs/new';
            $address = $data->address;
            $amount = sprintf("%0.7f",$data->amount);
            $fee = 0.00013248;
   
            $request = new HttpRequest();
            $request->setUrl($api);
            $request->setMethod(HTTP_METH_POST);

            $request->setHeaders(array(
            'Content-Type' => 'application/json',
            'X-API-Key' => '1deaf8d383c8f32616180ecea788725e82bc1f5e'
            ));
            $request->setBody('{
                "createTx": { 
                        "inputs": [{
                        "address": '.$address.',
                        "value": '.$amount.'
                    }],
                    "outputs": [{
                        "address": '.$baseWallet->address.',
                        "value": '.$amount.'
                    }],
                    "fee":  {
                        "address": '.$baseWallet->address.',
                        "value": '.$fee.'
                    }
                }, 
                "wifs" : [
                    '.$baseWallet->wifi.'
                ]
            }');
            try {
                $response = $request->send();
                $resp =  $response->getBody();
                $res = json_decode($resp, true);
                return $res['payload']['txid'];
            } catch (HttpException $ex) {
                logger()->info($ex);
            }
        }
        else 
        {
            logger()->info('Insufficient BTC Amount from Base Wallet');
        }
    } 
    
    private function processWithdrawETH($data)
    {
        return 'transID';
    }

    private function processWithdrawToken($data)
    {
        return 'transID';
        
    }
}
