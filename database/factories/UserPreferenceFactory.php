<?php

use App\UserPreference;
use Faker\Generator as Faker;

$factory->define(UserPreference::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class),
        'language' => 1, // only english
    ];
});
