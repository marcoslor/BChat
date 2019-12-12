<?php

namespace Tests\Feature;

use App\Chat;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Facades\Tests\Setup\ChatFactory;

class ChatTasksTests extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
    */
    public function a_user_can_create_a_task_in_a_chat_they_participate_in(){
        /** @var Chat $chat */
        $chat = ChatFactory::create();
        $this->actingAs($user = $chat->users()->get()->first());

        $this->post($chat->url().'/tasks', ['title'=>'task 01']);
        $this->assertEquals('task 01', $chat->tasks()->get()->first());
    }
}
