<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Log;
use App\Chat;
use App\ChatSetup;
use App\User;
class ChatController extends Controller
{
    public function getUser()
    {
        request()->validate([
            'email' => 'required|email|exists:users,email'
        ]);
        $user = User::whereEmail(request()->email)->first();
        $log = ChatSetup::with('user')->whereUserId($user->id)->first();
        $logs = $log ? $log :  [];
        return redirect('/block/chat/blockuser')->with('logs',$logs);
    }

    public function blockUser(ChatSetup $chat, $status)
    {
        $chat->update(['stat' => $status]);
        $log = ChatSetup::with('user')->where('id',$chat->id)->first();
        $logs = $log ? $log :  [];
        Log::create(
            [
                'user_id' => auth()->user()->id,
                'log' => ' Update user chat status'
            ]
        );
        return redirect('/block/chat/blockuser')->with('logs',$logs);
    }
}
