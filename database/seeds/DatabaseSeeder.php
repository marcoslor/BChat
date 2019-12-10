<?php

use App\Chat;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $user1 = factory('App\User')->create(['email'=>'1@example.com']);
        $user2 = factory('App\User')->create(['email'=>'2@example.com']);

        //
        $chat = factory('App\Chat')->create();
        $chat->addUser($user1);
        $chat->addUser($user2);
    }
}
