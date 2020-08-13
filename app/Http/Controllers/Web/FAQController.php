<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FAQ;

class FAQController extends Controller
{
    public function deleteFAQ(FAQ $faq)
    {
        $faq->delete();
        return redirect('/block/setup/faq')->with('msg','Delete Successful');
    }

    public function addfaq()
    {
        request()->validate(
            [
                'question' => 'required|string',
                'answer' => 'required|string'
            ]
        );
        FAQ::updateOrCreate(
            [
                'question' => request()->question
            ],
            [
                'answer' => request()->answer
            ]
        );
        return redirect('/block/setup/faq')->with('msg','Operation successful');
    }
}
