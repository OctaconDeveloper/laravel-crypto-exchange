<?php

namespace App\Http\Controllers\Web;

use App\Ballot;
use App\BallotBackLog;
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
            $count = BallotBackLog::whereTicker($log)->exists();
            if($count){
                $token = BallotBackLog::whereTicker($log)->first();
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

    public function addtoken()
    {
        $this->verifyAddToken();
        $isToken = BallotBackLog::whereTicker(request()->token_ticker)->whereName(request()->token_name)->exists();
        if($isToken){
            $error = request()->token_name." already captured";
            return redirect()->back()->withErrors([$error]);
        }else{

            if ($file = request()->file('token_file')) {
                $fileContent = $file->get();
                $ext = $file->getClientOriginalExtension();
                $file_name = Str::slug(request()->token_name).'-icon.' . $ext;
                 Storage::disk('public')->put('ballot_backlog/'.$file_name, $fileContent);
                $image = config('filesystems.disks.public.url').'/ballot_backlog/'.$file_name;

            }else{
                $error = "Token image is required";
                return redirect()->back()->withErrors([$error]);
            }

            $token = BallotBackLog::create(
                [
                    'name' => request()->token_name,
                    'type' => request()->token_type,
                    'ticker' => request()->token_ticker,
                    'base' => request()->token_base,
                    'address' => request()->token_address,
                    'image' => $image,
                    'circulation' => request()->token_circulation,
                    'description' => request()->token_description,
                    'url' => request()->token_url,
                    'white_paper' => request()->token_white_paper
                ]
            );
            Log::create(
                [
                    'user_id' => auth()->user()->id,
                    'log' => ' Added new coin listing token'
                ]
            );
            $msg = "Token added successfully";
            return redirect()->back()->with('msg',$msg);
        }
    }
    public function deletetoken(BallotBackLog $id)
    {
        $id->delete();
        return redirect()->back();
    }
    private function verifyAddToken()
    {
        return request()->validate([
            'token_base' => 'required|string',
            'token_name' => 'required|string',
            'token_ticker' => 'required|string',
            'token_address' => 'required|string',
            'token_file' => 'file|mimes:png,jpg,jpeg,svg|dimensions:max_width=25,max_height=25',
            'token_circulation' => 'required|string',
            'token_description' => 'required|string',
            'token_url' => 'required|string',
            'token_white_paper' => 'required|string',
        ]);
    }

    public function updatetoken(BallotBackLog $token)
    {
        request()->validate([
            "token_name" => "required|string",
            "token_address" => "required|string",
            'token_circulation' => 'required|string',
            'token_description' => 'required|string',
            'token_url' => 'required|string',
            'token_white_paper' => 'required|string'
        ]);
        $token->update([
            "name" => request()->token_name,
            "address" => request()->token_address,
            'circulation' => request()->token_circulation,
            'description' => request()->token_description,
            'url' => request()->token_url,
            'white_paper' => request()->token_white_paper
        ]);
        Log::create(
            [
                'user_id' => auth()->user()->id,
                'log' => ' Updated coin list token'
            ]
        );
        return redirect()->back();
    }
}
