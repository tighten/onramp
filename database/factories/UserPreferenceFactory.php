<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserPreference;
use Faker\Generator as Faker;

$factory->define(UserPreference::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(User::class);
        },
        'language' => 1, // only english
    ];
});
