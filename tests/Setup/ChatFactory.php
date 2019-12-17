<?php

namespace Tests\Setup;

use App\Chat;
use App\Task;

class ChatFactory {

    /**
     * @param int $count
     * @return Chat
     */
    public function create($count = 2){
        /** @var Chat $chat */

        for($i=0; $i<$count; $i++){
            $chat = factory('App\Chat')->create();
            $chat->addUser(factory('App\User')->create());
        }

        return $chat;
    }
}
