<?php

namespace Tests\Setup;

use App\Chat;
use App\Task;

class ChatFactory {

    /**
     * @return Chat
     */
    public function create(){
        /** @var Chat $chat */
        $chat = factory('App\Chat')->create();
        $chat->addUser(factory('App\Chat')->create());
        $chat->addUser(factory('App\Chat')->create());
        return $chat;
    }
}
