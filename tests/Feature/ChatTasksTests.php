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
        $chat = ChatFactory::create(2);

        $this->actingAs($chat->users->first())
            ->post($chat->url().'/tasks', ['body' => 'A task']);
        $this->assertEquals('A task', $chat->tasks->first()->body);
    }

    /**
     * @test
     */
    public function only_a_participant_can_create_a_task_in_a_chat(){
        $this->withoutExceptionHandling();

        /** @var Chat $chat */
        $chat = ChatFactory::create();

        $this->actingAs($user = factory('App\User')->create())
            ->post($chat->url().'/tasks', ['body' => 'A task'])
            ->assertUnauthorized();
    }
}
