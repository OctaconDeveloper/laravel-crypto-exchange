<?php

namespace App\Jobs;

use App\User;
use App\Log;
use App\Notification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class MultipleNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $messaage;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($messaage)
    {
        $this->messaage = $messaage;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $users = User::whereUserTypeId(3)->get();
        foreach($users as $user){
            Notification::create([
                'user_id'=> $user['id'],
                'message' => $this->messaage,
                'stat' => '0'
            ]);
            Log::create(
                [
                    'user_id' => auth()->user()->id,
                    'log' => ' sent notification to '.$user['email']
                ]
            );
        }
    }
}
