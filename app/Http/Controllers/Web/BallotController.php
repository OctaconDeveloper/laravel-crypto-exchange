<?php

namespace App\Http\Controllers\Web;

use App\Ballot;
use App\Http\Controllers\Controller;
use App\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Config;
class BallotController extends Controller
{
    public function store()
    {
        $this->storeValidate();

        $check = Ballot::whereFirstToken(request()->first_token)
        ->whereSecondToken(request()->second_token)
        ->whereThirdToken(request()->third_token)
        ->whereFourthToken(request()->fourth_token)
        ->exists();

        if($check){
            $error = "Vote details already captured";
            return redirect('/block/voting/newvoting')->withErrors([$error]);
        }else{

            $first_file = request()->file('first_file');
            $second_file = request()->file('second_file');
            $third_file = request()->file('third_file');
            $fourth_file = request()->file('fourth_file');

            if ($first_file && $second_file && $third_file && $fourth_file){

                $first_ext = $first_file->getClientOriginalExtension();
                $first_file_name = Str::slug(request()->first_token).'-ballot.' . $first_ext;

                $second_ext = $second_file->getClientOriginalExtension();
                $second_file_name = Str::slug(request()->second_token).'-ballot.' . $second_ext;

                $third_ext = $third_file->getClientOriginalExtension();
                $third_file_name = Str::slug(request()->third_token).'-ballot.' . $third_ext;

                $fourth_ext = $fourth_file->getClientOriginalExtension();
                $fourth_file_name = Str::slug(request()->fourth_token).'-ballot.' . $fourth_ext;


                Storage::putFileAs('ballot/', $first_file, $first_file_name);
                Storage::putFileAs('ballot/', $second_file, $second_file_name);
                Storage::putFileAs('ballot/', $third_file, $third_file_name);
                Storage::putFileAs('ballot/', $fourth_file, $fourth_file_name);


                $first_image = Config::get('app.url'). Storage::url('ballot/' . $first_file_name);
                $second_image = Config::get('app.url'). Storage::url('ballot/' . $second_file_name);
                $third_image = Config::get('app.url'). Storage::url('ballot/' . $third_file_name);
                $fourth_image = Config::get('app.url'). Storage::url('ballot/' . $fourth_file_name);


            }else{
                $error = "Tokens image is required";
                return redirect('/block/voting/newvoting')->withErrors([$error]);
            }

            $ballot = Ballot::create(
                [
                    'first_token' => request()->first_token,
                    'second_token' => request()->second_token,
                    'third_token' => request()->third_token,
                    'fourth_token' => request()->fourth_token,
                    'first_file' => $first_image,
                    'second_file' => $second_image,
                    'third_file' => $third_image,
                    'fourth_file' => $fourth_image,
                    'start_date' => request()->start_date,
                    'end_date' => request()->end_date,
                ]
            );
            return redirect('/block/voting/modifyvoting');
        }
    }

    private function storeValidate()
    {
        return request()->validate([
            'first_token' => 'required|string',
            'second_token' => 'required|string',
            'third_token' => 'required|string',
            'fourth_token' => 'required|string',
            'first_file' => 'required|file|mimes:png,jpg,svg,jpeg',
            'second_file' => 'required|file|mimes:png,jpg,svg,jpeg',
            'third_file' => 'required|file|mimes:png,jpg,svg,jpeg',
            'fourth_file' => 'required|file|mimes:png,jpg,svg,jpeg',
            'start_date' => 'required|string',
            'end_date' => 'required|string',
        ]);
    }

    public function delete (Ballot $vote)
    {
        Vote::whereBallotId($vote->id)->delete();
        $vote->delete();
        return redirect('/block/voting/modifyvoting');
    }
}
