<?php

use App\Track;
use Faker\Generator as Faker;

$factory->define(Track::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
    ];
});
