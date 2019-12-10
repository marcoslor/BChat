<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Events\MessageSent;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    protected function validateRequest()
    {
        return request()->validate([
            'body' => 'required',
        ]);
    }

    public function store(Chat $chat)
    {
        $user = Auth::user();

        if($chat->users->contains($user))
        {
            $message = Message::create(array_merge($this->validateRequest(), ['user_id'=> $user->id, 'chat_id'=>$chat->id]));
            event( new MessageSent($message) );

            return $this->getMessages($chat);

        }
    }

    public function getMessages(Chat $chat){
        return $chat->messages()->with('user')
            ->get()
            ->toJson();
    }
}
