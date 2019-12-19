<?php

 // @var \Illuminate\Database\Eloquent\Factory $factory

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
      'title' => $faker->realText(rand(10,20)),
      'body' => $faker->realText(rand(1000,3000)),
      'image' => $faker->imageUrl($width = 640, $height = 480),
      'user_id' => rand(1, App\User::get()->count()),

    ];
});
