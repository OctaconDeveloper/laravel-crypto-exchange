<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CustomerVerification;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class VerificationController extends Controller
{

    //Stat 0 incomplete, 1 complete 2 verified
    public function addPhone()
    {
        $data = CustomerVerification::updateOrCreate(
            ['user_id' => auth()->user()->id, 'email' => auth()->user()->email],
            ['phone' => request()->phone]
        );
        $this->checkStatus();
        $msg = "phone number updated";
        return redirect('/user/verification')->with('msg', $msg);
    }

    public function uploadKYC()
    {
        $this->verifyKYC();

        $doc = request()->file('file');
        $doc_ext = $doc->getClientOriginalExtension();
        $doc_name = Str::slug(auth()->user()->wallet_id). '-' .request()->file_type .'.'. $doc_ext;
        Storage::putFileAs('/public/kyc/', $doc, $doc_name);
        $file = config('app.url') . Storage::url('public/kyc/' . $doc_name);
        $data = CustomerVerification::updateOrCreate(
            ['user_id' => auth()->user()->id, 'email' => auth()->user()->email],
            [request()->file_type => $file]
        );
        $this->checkStatus();
        $msg = "File Upload Successful";
        return redirect('/user/verification')->with('msg', $msg);
    }

    private function verifyKYC()
    {
        return request()->validate([
            'file_type' => 'required|string',
            'file' => 'required|mimes:png,jpg,jpeg|max:1000000',
        ]);
    }

    private function checkStatus()
    {
        $data = CustomerVerification::whereUserId(auth()->user()->id)->first();
        if($data->phone!=null && $data->idcard!=null && $data->passport!=null){
            $data = CustomerVerification::updateOrCreate(
                ['user_id' => auth()->user()->id, 'email' => auth()->user()->email],
                ['stat' => 1]
            );
        }
    }
}
