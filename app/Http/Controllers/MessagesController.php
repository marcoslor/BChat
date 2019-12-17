<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Events\MessageSent;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    protected $rules = [
        'body' => 'required',
    ];

    protected function validateRequest($key)
    {
        if ($key)
        {
            return request()->validate($this->rules)[$key];
        }
        return request()->validate($this->rules);
    }

    public function store(Chat $chat)
    {
        $user = Auth::user();

        if ($chat->users->contains($user))
        {
            $chat->addMessage($this->validateRequest('body'), $user->id);
            return $this->getMessages($chat);
        }
    }

    /**
     * Return messages with user object
     *
     * @param Chat $chat
     * @return string
     */
    public function getMessages(Chat $chat){
        return $chat->messages()->with('user')
            ->get()
            ->toJson();
    }
}
