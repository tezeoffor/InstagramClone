<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'body' => $faker->realText(rand(10,20)),
        'user_id' => rand(1, App\User::get()->count()),
        'post_id' => rand(1, App\Post::get()->count()),
    ];
});
