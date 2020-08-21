<?php

namespace App\Jobs;

use App\Mail\NotificationMail;
use App\Notification;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class MultipleNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $notification;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($notification)
    {
        $this->notification = $notification;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $users = User::where('user_type_id',4)->get();
        foreach($users as $user){
            Notification::create([
                'user_id'=> $user['id'],
                'message' => $this->notification,
                'stat' => '0'
            ]);
            Mail::to($user['email'])->send(new NotificationMail($user,$this->notification));
        }
        // return $this->notification;
    }
}
