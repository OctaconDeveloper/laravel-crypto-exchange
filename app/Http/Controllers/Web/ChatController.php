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
    //1 active
    // 0 block
    public function getUser()
    {
        request()->validate([
            'email' => 'required|email|exists:users,email'
        ]);
        $user = User::whereEmail(request()->email)->first();
        $log = ChatSetup::with('user')->whereUserId($user->id)->first();
        $logs = $log ? $log :  [];
        return redirect()->back()->with('logs',$logs);
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
        return redirect()->back()->with('logs',$logs);
    }

    public function is_chat()
    {
        return  (auth()->user()) ? ChatSetup::whereUserId(auth()->user()->id)->count() : null;
    }

    public function chat_details()
    {
        return (auth()->user()) ? ChatSetup::whereUserId(auth()->user()->id)->first() : null;
    }

    public function saveChat()
    {
        $chatDetails = ChatSetup::whereUserId(auth()->user()->id)->first();
        if(request()->chat_message){
            $data =  Chat::create([
                'user_id' => 1,
                'name' => $chatDetails->name,
                'stat' => '1',
                'message' => request()->chat_message
            ]);
            $log['type'] = 'success';
            $log['data'] = $data;
            return json_encode($log);
        }
    }

    public function all_chats()
    {
        return Chat::orderBy('id','ASC')->get();
    }

    public function saveChatName()
    {
        if(request()->chat_name){
            $data = ChatSetup::create([
                'user_id' => auth()->user()->id,
                'stat' => '1',
                'name' => request()->chat_name
            ]);
            if($data){
                $log['type'] = 'success';
                $log['msg'] = 'Chat Name setup' ;
            }else{
                $log['type'] = 'danger';
                $log['msg'] = 'Error setting up chat name' ;
            }
            return json_encode($log);
        }

    }

}
