<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use App\Events\SendMessage;

class ChatController extends Controller
{
    public function chat(){
        return view('chat');
    }

    public function messages(){
        return Message::with('user')->get();
    }

    public function fetchMessages()
{
  return Message::with('user')->get();
}

    public function messageStore(Request $request){
        $user = Auth::user();

        $messages = $user->messages()->create([
            'message' => $request->message
        ]);

        broadcast(new SendMessage($user, $messages))->toOthers();

        return 'message sent';
    }
}
