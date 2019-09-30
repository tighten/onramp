<?php

use App\Module;
use App\Track;
use Faker\Generator as Faker;

$factory->define(Module::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
    ];
});
