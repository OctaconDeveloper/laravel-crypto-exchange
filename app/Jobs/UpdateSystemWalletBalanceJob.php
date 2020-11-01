<?php

namespace App\Jobs;

use App\SystemWallet;
use App\Token;
use App\TradeSetup;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class UpdateSystemWalletBalanceJob implements ShouldQueue
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
        $this->processBTC();
        $this->processETH();
        $this->processTokens();
    }
 
    private function processBTC()
    {
        $trade_mode = TradeSetup::first()->trade_mode;
        //Get BTC Details
        $btcWallet = SystemWallet::whereTicker('BTC')->whereStatus(1)->first();
        $api = 'https://api.cryptoapis.io/v1/bc/btc/'.$trade_mode.'/address/'.$btcWallet->address;

        $response = new Http();
        
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'X-API-Key' => '1deaf8d383c8f32616180ecea788725e82bc1f5e'
        ])->get($api);
        $res = json_decode($response, true);
        $balance = $res['payload']['balance'];
        $btcWallet->update([
            'amount' => $balance
        ]);
        $btc = Token::whereTicker('BTC')->first();
        $btc->update([
            'balance' => $balance
        ]);
    }

    private function processETH()
    {
        $trade_mode = TradeSetup::first()->trade_mode;
        //Get ETH Details
        $ethWallet = SystemWallet::whereTicker('ETH')->whereStatus(1)->first();
        if($trade_mode === 'mainnet')
        {
            $api = 'https://api.cryptoapis.io/v1/bc/eth/'.$trade_mode.'/address/'.$ethWallet->address;
        }
        else 
        {
            $api = 'https://api.cryptoapis.io/v1/bc/eth/ropsten/address/'.$ethWallet->address;
        }

        $response = new Http();
        
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'X-API-Key' => '1deaf8d383c8f32616180ecea788725e82bc1f5e'
        ])->get($api);
        $res = json_decode($response, true);
        $balance = $res['payload']['balance'];
        $ethWallet->update([
            'amount' => $balance
        ]);
        $eth = Token::whereTicker('ETH')->first();
        $eth->update([
            'balance' => $balance
        ]);
        
    }

    private function processTokens()
    {
        $trade_mode = TradeSetup::first()->trade_mode;
        //Get all Tokens
        $tokens = Token::where('ticker','!=','BTC')->where('ticker','!=','ETH')->get();
        foreach ($tokens as $token)
        {
            $response = new Http();
            $tokenContract = $token->address;
            $ethWallet = SystemWallet::whereTicker('ETH')->whereStatus(1)->first();
            $ethAddress = $ethWallet->address;
            $api = 'https://api.cryptoapis.io/v1/bc/eth/'.$trade_mode.'/tokens/'.$ethAddress.'/'.$tokenContract.'/balance';

            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'X-API-Key' => '1deaf8d383c8f32616180ecea788725e82bc1f5e'
                ])->get($api);
                $res = json_decode($response, true);
                $balance = $res['payload']['token'];
                $token->update([
                    'balance' => $balance
                ]);
        }

    }
