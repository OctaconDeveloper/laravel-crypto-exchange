<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\WithdrawalAddress;

class WalletController extends Controller
{
    public function addWithdrawalAddress()
    {
        $check = WithdrawalAddress::whereUserId(auth()->user()->id)
        ->whereType(request()->coin_type)
        ->whereAddress(request()->address)
        ->count();
        if($check){
            return redirect('/user/wallet-addresses')->withErrors(["Duplicate entry not allowed"]);
        }else{
            $address = WithdrawalAddress::create([
                'user_id' => auth()->user()->id,
                'type' => request()->coin_type,
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
}
