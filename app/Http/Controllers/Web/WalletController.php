<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\WithdrawalAddress;
use App\Wallet;
use App\Token;
use App\WithdrawRequest;
use Illuminate\Support\Facades\Http;
class WalletController extends Controller
{
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
            $msg = "New withdrawal address added.";
            return redirect('/user/wallet-addresses')->with('msg', $msg);
        }
    }

    public function removeWithdrawalAddress(WithdrawalAddress $id)
    {
        $id->delete();
        $msg = "Address deleted.";
        return redirect('/user/wallet-addresses')->with('msg', $msg);
    }

    public function newAddress()
    {
        $coin_type = request()->token_type;
        $coin_base = request()->token_base;
        $data =  $this->checkAddress($coin_type,$coin_base) ? $this->getAddress($coin_type,$coin_base) : $this->createAddress($coin_type,$coin_base);
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

    private function createAddress($coin_type,$coin_base)
    {
        $response = new Http();

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'X-API-Key' => '1deaf8d383c8f32616180ecea788725e82bc1f5e'
        ])->post('https://api.cryptoapis.io/v1/bc/'.strtolower($coin_type).'/mainnet/address');
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
        return $user_wallet->address;
    }


    public function requestWithdrawal(){
        //Get Fee  Structure
        $coin_info = Token::whereTicker(request()->coin)->first();
        $withdrawal_fee = $coin_info->withdrawal_fee;
        $total_fee = $withdrawal_fee+request()->amount;

        // Get User Balance
        $user_balance = Wallet::whereUserId(auth()->user()->id)->whereTicker(request()->coin)->first();
        $new_balance = $user_balance->amount - $total_fee;

        //Substract Amount from Wallet
        $Wallet = $user_balance->update([
            'amount' => $new_balance
        ]);


       $debit =  WithdrawRequest::create([
            'user_id' => auth()->user()->id,
            'withdraw_address' => request()->address,
            'withdraw_amount' => request()->amount,
            'withdraw_fee' => $withdrawal_fee,
            'ticker' => request()->coin,
            'status' => 1,
        ]);

        $msg = "Withdrawal request made";
        return redirect('/user/withdrawal')->with('msg', $msg);
    }

    public function listRequest(){
        $data = WithdrawRequest::with('trans_type')->whereUserId(auth()->user()->id)->orderBy('created_at','DESC')->get();
        return redirect('/user/withdrawal')->with('data', $data);
    }
}
