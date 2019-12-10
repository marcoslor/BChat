<?php

/** @var Factory $factory */

use App\Chat;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Chat::class, function (Faker $faker) {
    return [
        'title'=>'Chat Title',
        'description'=>'Chat Description',
    ];
});
