<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Token;
use App\Log;
use Illuminate\Support\Facades\Storage;

use Config;

class TokenController extends Controller
{

    // case 0:
    //     return "Available";
    //     break;
    // case 1:
    //     return "Unavailable";
    //     break;
    // case 2:
    //     return "Under Maintainance";
    //     break;

    public function addtoken()
    {
        $this->verifyAddToken();
        $isToken = Token::whereTicker(request()->token_ticker)->whereName(request()->token_name)->exists();
        if($isToken){
            $error = request()->token_name." already captured";
            return redirect()->back()->withErrors([$error]);
        }else{

            if ($file = request()->file('token_file')) {
                $fileContent = $file->get();
                $ext = $file->getClientOriginalExtension();
                $file_name = Str::slug(request()->token_name).'-icon.' . $ext;
                 Storage::disk('public')->put('token/'.$file_name, $fileContent);
                $image = config('filesystems.disks.public.url').'/token/'.$file_name;

            }else{
                $error = "Token image is required";
                return redirect()->back()->withErrors([$error]);
            }

            $token = Token::create(
                [
                    'name' => request()->token_name,
                    'type' => request()->token_type,
                    'ticker' => request()->token_ticker,
                    'base' => request()->token_base,
                    'address' => request()->token_address,
                    'withdrawal_fee' => request()->withdrawal_fee,
                    'withdraw_stat' => 1,
                    'deposit_stat' => 1,
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
                    'log' => ' Added new token'
                ]
            );
            $msg = "Token added successfully";
            return redirect()->back()->with('msg',$msg);
        }
    }

    private function verifyAddToken()
    {
        return request()->validate([
            'token_base' => 'required|string',
            'token_type' => 'required|string',
            'token_name' => 'required|string',
            'token_ticker' => 'required|string',
            'token_address' => 'required|string',
            'withdrawal_fee' => 'required|numeric|between:0,99.99',
            'token_file' => 'file|mimes:png,jpg,jpeg,svg|dimensions:max_width=25,max_height=25',
            'token_circulation' => 'required|string',
            'token_description' => 'required|string',
            'token_url' => 'required|string',
            'token_white_paper' => 'required|string',
        ]);
    }

    public function removeToken(Token $token)
    {
        $type = $token->type;
        $token->delete();
        Log::create(
            [
                'user_id' => auth()->user()->id,
                'log' => ' Delete token '
            ]
        );
        return redirect()->back();

    }

    public function updatetoken(Token $token)
    {
        request()->validate([
            "token_type" => "required|string",
            "token_name" => "required|string",
            "token_address" => "required|string",
            "withdrawal_fee" => "required|numeric|between:0,99.99",
            "withdraw_stat" =>  "required|numeric",
            "deposit_stat" =>  "required|numeric",
            'token_circulation' => 'required|string',
            'token_description' => 'required|string',
            'token_url' => 'required|string',
            'token_white_paper' => 'required|string'
        ]);
        $token->update([
            "type" => request()->token_type,
            "name" => request()->token_name,
            "address" => request()->token_address,
            "withdrawal_fee" => request()->withdrawal_fee,
            "withdraw_stat" =>  request()->withdraw_stat,
            "deposit_stat" =>  request()->deposit_stat,
            'circulation' => request()->token_circulation,
            'description' => request()->token_description,
            'url' => request()->token_url,
            'white_paper' => request()->token_white_paper
        ]);
        Log::create(
            [
                'user_id' => auth()->user()->id,
                'log' => ' Updated token'
            ]
        );
        return redirect()->back();
    }
}
