<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Stake;
use App\Log;
use Illuminate\Http\Request;

class StakingController extends Controller
{
    public function store()
    {
        $this->validateStore();
        $is_exist = Stake::whereTokenId(request()->token)->exists();
        if($is_exist){
            $error = "Stake alreay exist for this coin";
            return redirect('/block/staking/addstakes')->withErrors([$error]);
        }else{
            Stake::create([
                'token_id' => request()->token,
                'minimum_deposit' => request()->minimum_deposit,
                'minimum_annual' => request()->minimum_annual,
                'maximum_annual' => request()->maximum_annual,
                'keywords' => request()->keywords,
                'duration' => request()->duration
            ]);
            Log::create(
                [
                    'user_id' => auth()->user()->id,
                    'log' => ' Added new coin stake'
                ]
            );
            $msg = "Stake added successfully";
            return redirect('/block/staking/addstakes')->with('msg',$msg);
        }
    }

    private function validateStore()
    {
        return request()->validate([
            'token' => 'required|numeric|exists:tokens,id',
            'minimum_deposit' => 'required|string',
            'minimum_annual' => 'required|string',
            'maximum_annual' => 'required|string',
            'keywords' => 'nullable|string',
            'duration' => 'required|string'
        ]);
    }

    public function delete(Stake $stake)
    {
        $stake->delete();
        Log::create(
            [
                'user_id' => auth()->user()->id,
                'log' => ' Delete coin stake'
            ]
        );
        return redirect('/block/staking/allstakes');
    }
}
