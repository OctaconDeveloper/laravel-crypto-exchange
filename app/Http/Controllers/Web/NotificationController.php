<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Notification;
use App\User;
use App\Log;
use App\Jobs\MultipleNotificationJob;
use App\SocialMedia;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function single()
    {
        request()->validate([
            'email' => 'required|email|exists:users,email',
            'message' => 'required|string'
        ]);
       $user = \App\User::whereEmail('jeanne.muller@example.net')->first();

        Notification::create([
            'user_id'=> $user->id,
            'message' => request()->message,
            'stat' => '0'
        ]);
        Log::create(
            [
                'user_id' => auth()->user()->id,
                'log' => ' sent notification to '.$user->email
            ]
        );
        $msg = "Notification sent successfully";
        return redirect('/block/notifications/single')->with('msg',$msg);
    }

    public function multiple()
    {
        request()->validate([
            'message' => 'required|string'
        ]);
            $messaage = request()->message;
        MultipleNotificationJob::dispatch($messaage);

        $msg = "Notifications added to queue";
        return redirect('/block/notifications/multiple')->with('msg',$msg);
    }

    public function savemedia()
    {
        request()->validate([
            'facebook_handle' => 'required|string',
            'twitter_handle' => 'required|string',
            'instagram_handle' => 'required|string',
            'discord_handle' => 'required|string',
        ]);
        SocialMedia::updateOrCreate(
            [
                'id' => 1
            ],
            [
                'facebook_handle' => request()->facebook_handle,
                'twitter_handle' => request()->twitter_handle,
                'instagram_handle' => request()->instagram_handle,
                'discord_handle' => request()->discord_handle,
            ]
        );
        Log::create(
            [
                'user_id' => auth()->user()->id,
                'log' => ' update social media '
            ]
        );
        $msg = "Updated successfully";
        return redirect('/block/setup/socialmedia')->with('msg',$msg);
    }
}
