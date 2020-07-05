<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Users;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Users::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'active' => $faker->boolean(),
    ];
});
