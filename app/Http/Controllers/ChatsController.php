<?php

namespace App\Http\Controllers;

use App\Chat;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{
    protected function validateRequest()
    {
        return request()->validate([
            'title' => 'sometimes|nullable',
            'description' => 'sometimes|nullable',
            'users' => 'required'
        ]);
    }

    public function index()
    {
        return view('chats')->with('chats', Auth::user()->chats);
    }

    public function show(Chat $chat)
    {
        return view('chat')->with('chat', $chat);
    }
    public function create()
    {
        return view('chat.create');
    }

    public function store()
    {
        //validate
        $attributes = $this->validateRequest();

        //persist
        /** @var Chat $chat */
        $chat = Auth::user()->chats()->create($attributes);

        foreach ($attributes['users'] as $user ) {
            $chat->addUser($user);
        }

        //redirect
        return Response::create('Sucesso','200');
    }
}
