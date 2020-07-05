<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UsersAcess;
use Faker\Generator as Faker;

$factory->define(UsersAcess::class, function (Faker $faker) {
    return [
        'last_login' => $faker->dateTime,
        'users_id' => function () {
            return App\Users::inRandomOrder()->first()->id;
        }
    ];
});
