<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\post;
use Faker\Generator as Faker;

$factory->define(post::class, function (Faker $faker) {
    return [
        'user_id'=>factory(App\User::class),
        'body'=>$faker->sentence
    ];
});
