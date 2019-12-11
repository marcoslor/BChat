<?php

namespace Tests\Unit;

use App\Chat;
use App\Events\MessageSent;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class MessageTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A message must belongs to an user
     *
     * @test
     */
    public function it_belongs_to_an_user()
    {

        $this->assertTrue(true);
    }

    /**
     * Every MessageSent event must be broadcasted.
     *
     * @test
     */
    public function event_is_broadcasted_when_message_is_sent()
    {
        Event::fake();

        /** @var Chat $chat */
        $chat = factory('App\Chat')->create();

        $chat->addUser($user = factory('App\User')->create());
        $this->actingAs($user);
        $chat->sendMessage('hello', $user->id);

        Event::assertDispatched(MessageSent::class);
    }
}
