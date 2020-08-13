<?php

namespace App\Http\Controllers\Web;

use App\Ballot;
use App\Http\Controllers\Controller;
use App\Vote;
use App\Log;
use App\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Config;
class BallotController extends Controller
{
    public function store()
    {
        $this->storeValidate();

        $start_date = request()->start_date;
        $end_date = request()->end_date;
        $tokenLog = explode(",", request()->tokens);
        $block_hash = "NVD".sprintf("%0.7s",str_shuffle(rand(45,9000) * time()));
        foreach($tokenLog as $log){
            $count = Token::whereTicker($log)->exists();
            if($count){
                $token = Token::whereTicker($log)->first();
                $this->saveBallot($block_hash,$token,$start_date,$end_date);
            }
        }
       Log::create(
            [
                'user_id' => auth()->user()->id,
                'log' => ' Create coin vote details'
            ]
        );
        return redirect('/block/voting/modifyvoting');
    }

    private function saveBallot($block_hash,$token,$start_date,$end_date)
    {
        Ballot::create(
                [
                    'ballot_hash' => $block_hash,
                    'token_name' => $token->name,
                    'token_ticker' => $token->ticker,
                    'token_image' => $token->image,
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                ]
            );
    }

    private function storeValidate()
    {
        return request()->validate([
            'tokens' => 'required|string',
            'start_date' => 'required|string',
            'end_date' => 'required|string',
        ]);
    }

    public function delete (Ballot $vote)
    {
        Vote::whereBallotHash($vote->ballot_hash)->whereTokenName($vote->token_name)->delete();
        $vote->delete();
        Log::create(
            [
                'user_id' => auth()->user()->id,
                'log' => ' Delete coin vote details'
            ]
        );
        return redirect('/block/voting/modifyvoting');
    }
}
