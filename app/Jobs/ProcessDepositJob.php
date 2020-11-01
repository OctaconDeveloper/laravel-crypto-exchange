<?php

namespace App\Jobs;

use App\SystemWallet;
use App\TradeSetup;
use App\Wallet;
use App\WalletDeposit;
use App\WalletHistory;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Web3p\EthereumTx\Transaction;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class ProcessDepositJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $client;
    public $trade_mode;
    public $min_btc;
    public $min_eth;
    public $btc_mainAddress;
    public $eth_mainAddress;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->trade_mode  =  TradeSetup::first()->trade_mode;
        $this->min_btc  =  0.001; //in btc
        $this->min_eth  =  0.01; //in ether
        $this->btc_mainAddress  =  SystemWallet::whereTicker('BTC')->whereStatus(1)->first(); 
        $this->eth_mainAddress  =  SystemWallet::whereTicker('ETH')->whereStatus(1)->first();
       
    }

    /**
     * Execute the job.
     *
     * @return void 
     */
    public function handle()
    { 
            $wallets = Wallet::all();
            foreach($wallets as $wallet)
            {
                if($wallet->ticker === 'BTC')
                {
                    $this->processBitcoin($wallet);
                }
                else if($wallet->ticker === 'ETH')
                {
                    // logger()->info('ETH Here');
                    //  $this->processEthereum($wallet);
                }
                else 
                {
                    //if its a token
                    //$this->processToken();
                }
            }

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

    private function processBitcoin($btcWallet)
    {
        //Get wallet balance 
            $btcBalance = $this->getBTCBalance($this->trade_mode,$btcWallet->address);
            //if wallet balance greater than minimum bitcoin deposit
            if($btcBalance['statusCode'] === 200  && $btcBalance['balance'] >= $this->min_btc)
            {
                    //Calculate gas fee
                    $gasFee = $this->calculateBtcGasFee();
                    //deduct gas fee from wallet (decalare amount to send and gas fee) 
                        $toSend = $btcBalance['balance'] - $gasFee;
            //             //process Bitcoin send
                        $transaction = $this->sendBtc($btcWallet,$toSend,$gasFee,$this->btc_mainAddress);
                        if($transaction)
                        {
                            //insert into wallet_deposits;
                            $status = 3;
                            $trackID = "D-".sprintf("%0.9s", str_shuffle(rand(20,2000) * time() ));
                            $this->insertToWalletDeposit($btcWallet->user_id, $btcWallet->address, $toSend, $btcWallet->ticker, $status, $transaction, $trackID);
                            $this->insertToWalletHistory($btcWallet->user_id, $btcWallet->address, $toSend, $btcWallet->ticker, $status, $transaction, $trackID, $gasFee);
                        }
                        else
                        {
                            return;
                        }
            }
            else
            {
                return; 
            }

    }

    private function processEthereum($ethWallet)
    {
        //Get wallet balance 
        $ethBalance = $this->getEthBalance($this->trade_mode,$ethWallet->address);
        //if wallet balance greater than minimum bitcoin deposit
        if($ethBalance['statusCode'] === 200  && $ethBalance['balance'] >= $this->min_eth)
        {
                    //process Ethereum send
                    $transaction = $this->sendEth($ethWallet,$ethBalance['balance'],$this->eth_mainAddress);
                    if($transaction && $transaction['transID'])
                    {
                        //insert into wallet_deposits;
                        $status = 3;
                        $trackID = "D-".sprintf("%0.9s", str_shuffle(rand(20,2000) * time() ));
                        $this->insertToWalletDeposit($ethWallet->user_id, $ethWallet->address, $transaction['toSend'], $ethWallet->ticker, $status, $transaction['transID'], $trackID);
                        $this->insertToWalletHistory($ethWallet->user_id, $ethWallet->address, $transaction['toSend'], $ethWallet->ticker, $status, $transaction['transID'], $trackID, $transaction['gasFee']);
                    }
                    else
                    {
                        return;
                    }
        }
        else
        {
            return; 
        }

    }    
    
    private function processToken()
    { 
        //Get wallet balance

        //Calculate gas fee

        //send gas fee to wallet

        //process Token send
    }

    private function getBTCBalance($trade_mode,$btcAddress)
    {
        $result = $this->HttpClient()->get('btc/'.$trade_mode.'/address/'.$btcAddress);
        $body = json_decode($result->getBody(), true);
        $response = $body['payload']['balance'];
        $status = $result->getStatusCode();
        $data = [
            'balance' => $response, 
            'statusCode' => $status];
        return $data;
        
    }
    private function getETHBalance($trade_mode,$ethAddress)
    {
        if($trade_mode=='testnet')
        {
            $t_mode = "ropsten";
        }
        else
        {
            $t_mode = $trade_mode;
        }
        
        $result = $this->HttpClient()->get('eth/'.$t_mode.'/address/'.$ethAddress);
        $body = json_decode($result->getBody(), true);
        $response = $body['payload']['balance'];
        $status = $result->getStatusCode();
        $data = [
            'balance' => $response, 
            'statusCode' => $status];
        return $data;
        
    }

    private function calculateBtcGasFee()
    {
        return 0.0000176;
    }
 
    private function sendBtc($wallet,$amounToSend,$gasFee, $btc_mainAddress)
    {
          $bodyData = '{
            "createTx": { 
                    "inputs": [{
                    "address": "'.$wallet['address'].'",
                    "value": "'.$amounToSend.'"
                }],
                "outputs": [{
                    "address": "'.$btc_mainAddress['address'].'",
                    "value": "'.$amounToSend.'"
                }],
                "fee":  {
                    "address": "'.$wallet['address'].'",
                    "value": "'.$gasFee.'"
                }
            }, 
             "wifs" : [
                    "'.decrypt_data($wallet['wif']).'"
            ]
        }'; 

        
        $result = $this->HttpClient()->post('btc/'.$this->trade_mode.'/txs/new', ['body' => $bodyData ]);
        $body = json_decode($result->getBody(), true);
        return $response = $body['payload']['txid'];
        
    } 
    private function getNonce()
    {
        $nonce = rand(50, 5000) * time();
        return sprintf("%0.1s",str_shuffle($nonce));
    }

    private function sendEth($wallet,$amounToSend,$eth_mainAddress)
    {
        
        $gasLimit = 21000;
        $gasPrice = 40;
        // $gasLimitInGwei = ($gasLimit * 0.000000001);
        // $gasPriceInGwei = ( $gasPrice * 0.000000001);
        $transFee = ($gasLimit * $gasPrice) * 0.000000001;
        $toSend = ($amounToSend - $transFee); // - 1000000; // * 1000000000000000000;
        $data = [
            'gas Limit' => $gasLimit,
            'gas Price' => $gasPrice,
            'transFee' => $transFee,
            'amount' => number_format($amounToSend * 1000000000) ,
            'total' => number_format($transFee + $toSend),
            'toSend' => number_format($toSend),
        ]; 
        dd($data);
        if($this->trade_mode=='testnet')
        {
            $t_mode = "ropsten";
            $chainId = 3;
        }
        else
        {
            $t_mode = $this->trade_mode;
            $chainId = 1;
        }
        $response = [
            "nonce" => "4",
            "from" => $wallet->address,
            'to' => $eth_mainAddress['address'],
            "gasLimit" =>  $gasLimit,
            "gasPrice" => $gasPrice,
            "value" => (string) sprintf('%0.0f', $toSend),
            "chainId" => (string) $chainId,
            // 'data' => $eth_mainAddress['address'],
        ];
        // $bodyPass = '{
        //     "fromAddress" : "'.$wallet->address.'",
        //     "toAddress" : "'.$eth_mainAddress['address'].'",
        //     "value" : '.$amounToSend.'
        //   }';
        // $url = 'https://api.cryptoapis.io/v1/bc/eth/'.$t_mode.'/txs/send';
        // $result = $this->HttpClient()->post($url, ['body' => $bodyPass ]);
        // $body = json_decode($result->getBody(), true);
        //   $response = $body['payload'];
        //   $response['chainId'] = $chainId;
        //   $response['gas'] = "29";
        // dd($response);



        // dd($response);

        $transaction = new Transaction($response);
        $privateKey = decrypt_data($wallet->privateKey);
        $signedTransaction = "0x".$transaction->sign($privateKey);
        $bd = $this->broadCast($signedTransaction, $t_mode);
        return [
            'transID' => $bd,
            'gasFee' => $transFee,
            'toSend' => $toSend
        ];
        
    }
    private function broadCast($signedTransaction, $t_mode)
    {

        try {
            $bodyPass = '{"hex" : "'.$signedTransaction.'"}';
            $url = 'https://api.cryptoapis.io/v1/bc/eth/'.$t_mode.'/txs/push';
            $result = $this->HttpClient()->post($url, ['body' => $bodyPass ]);
            $body = json_decode($result->getBody(), true);  
            logger()->info($body['payload']);
            return $response = $body['payload']['hex'];

        } catch (\GuzzleHttp\Exception\ConnectException $e) {
            logger()->info('Connection Error => '.$e);
            return;
        } catch (\GuzzleHttp\Exception\ClientException $e) { 
            logger()->info('Processing Error => '.$e);
            return;
        }
        
    }

    private function insertToWalletDeposit($userID, $address, $amount, $ticker, $status, $transID, $trackID)
    {
        $data = [
            'user_id' => $userID,
            'address' => $address,
            'amount' => $amount,
            'ticker' => $ticker,
            'status' => $status,
            'trackID' => $trackID,
            'transID' => $transID,
        ];
        WalletDeposit::create($data);
    }

    private function insertToWalletHistory($userID, $address, $amount, $ticker, $status, $transID, $trackID, $fee)
    {
        $data = [
            'user_id' => $userID,
            'trackID' => $trackID,
            'address' => $address,
            'amount' => $amount,
            'fee' => $fee,
            'ticker' => $ticker,
            'type' => 'deposit',
            'transID' => $transID,
            'status' => $status
        ];
        WalletHistory::create($data);
    }
 
}
 