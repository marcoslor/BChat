<?php

namespace Tests\Unit;

use App\Events\MessageSent;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MessageTest extends TestCase
{
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
        broadcast(new MessageSent($message));
        $this->assertEventIsBroadcasted(
            MessageSent::class,
            'private-notification.' . $notification->id
        );
    }
}
