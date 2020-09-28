<?php

namespace App\Http\Controllers\Web;

use App\Broadcast;
use App\Http\Controllers\Controller;
use App\Jobs\MultipleBroadcastJob;
use App\Jobs\MultipleNotification;
use App\Notification;
use App\User;
use App\Log;
use App\Jobs\MultipleNotificationJob;
use App\SocialMedia;
use Illuminate\Http\Request;
use App\Mail\NotificationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class NotificationController extends Controller
{
    public function single()
    {
        request()->validate([
            'email' => 'required|email|exists:users,email',
            'message' => 'required|string'
        ]);
       $user = \App\User::whereEmail(request()->email)->first();

        Notification::create([
            'user_id'=> $user->id,
            'message' => request()->message,
            'stat' => '0'
        ]);
        Mail::to(request()->email)->send(new NotificationMail($user,request()->message));
        Log::create(
            [
                'user_id' => auth()->user()->id,
                'log' => ' sent notification to '.$user->email
            ]
        );
        $msg = "Notification sent successfully";
        return redirect()->back()->with('msg',$msg);
    }

    public function multiple()
    {
        request()->validate([
            'message' => 'required|string'
        ]);
        MultipleNotification::dispatch(request()->message);

        $msg = "Notifications added to queue";
        return redirect()->back()->with('msg',$msg);
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
        return redirect()->back()->with('msg',$msg);
    }

    public function getMedia()
    {
        return SocialMedia::first();
    }


    public function sendBroadcast()
    {
        request()->validate([
            'broadcast_title' => 'required|string',
            'broadcast_message' => 'required|string',
            'broadcast_image' => 'file|mimes:png,jpg,jpeg,svg',
        ]);
        if ($file = request()->file('broadcast_image')) {
            $fileContent = $file->get();
            $ext = $file->getClientOriginalExtension();
            $file_name = Str::slug(request()->broadcast_title).'.' . $ext;
             Storage::disk('public')->put('broadcast/'.$file_name, $fileContent);
            $image = config('filesystems.disks.public.url').'/broadcast/'.$file_name;

        }else{
            $error = "Broadcast image is required";
            return redirect()->back()->withErrors([$error]);
        }

       $broadcast =  Broadcast::create([
            'title'=> request()->broadcast_title,
            'message' => request()->broadcast_message,
            'image' => $image
        ]);
        MultipleBroadcastJob::dispatch($broadcast);
        Log::create(
            [
                'user_id' => auth()->user()->id,
                'log' => ' new broadcast'
            ]
        );
        $msg = "Broadcast sent";
        return redirect()->back()->with('msg', $msg);
    }

    public function fetchBroadcast()
    {
        return Broadcast::orderBy('id','DESC')->get();
    }

    public function getBroadcast($title)
    {
        return Broadcast::where('title',$title)->first();
    }
}
