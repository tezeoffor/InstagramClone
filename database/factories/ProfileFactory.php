<?php

 // @var \Illuminate\Database\Eloquent\Factory $factory

use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'description' => $faker->realText(rand(10, 20)),
        'url' => $faker->url(),
        'user_id' => rand(1, App\User::get()->count())
    ];
});
