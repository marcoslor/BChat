<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ChatManagingTests extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
    */
    public function a_user_can_create_a_chat_with_other_users(){
        $this->withoutExceptionHandling();
        $this->actingAs($user = factory('App\User')->create())
            ->post('/chats', ['title'=>'Chat da empresa','users'=>[factory('App\User')->create()]]);

        //dd($user->chats()->get());
        $this->assertEquals("Chat da empresa", $user->chats()->get()->first()->title);
    }

    /**
     * @test
     */
    public function a_chat_must_have_more_than_two_users(){
        $this->actingAs($user = factory('App\User')->create())
            ->post('/chats', ['title'=>'Chat da empresa'])
            ->assertSessionHasErrors();
    }

    /**
     * @test
     */
    public function only_a_logged_in_user_can_create_chats(){
        $this->post('/chats', ['title'=>'Chat da empresa'])->assertStatus(302);
    }

    /**
     * @test
     */
    public function a_user_can_send_another_user_a_message(){
        $this->withoutExceptionHandling();
        $this->actingAs($user = factory('App\User')->create())
            ->post('/chats', ['title'=>'Chat da empresa', 'users'=>[$user2 = factory('App\User')->create()]]);

        $this->post($user->chats->first()->url().'/messages', ['body'=>'hello']);
        $this->assertEquals('hello', $user2->chats->first()->messages->first()->body);
    }


}
