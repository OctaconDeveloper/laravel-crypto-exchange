<?php

namespace App\Jobs;

use App\Broadcast;
use App\Mail\BroadcastMail;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class MultipleBroadcastJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $broadcast;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Broadcast $broadcast)
    {
        $this->broadcast = $broadcast;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $users = User::whereUserTypeId(4)->get();
        foreach($users as $user){
            Mail::to($user->email)->send(new BroadcastMail($user,$this->broadcast));
        }
    }
}
