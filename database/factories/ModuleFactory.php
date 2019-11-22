<?php

use App\Module;
use Faker\Generator as Faker;

$factory->define(Module::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'slug' => function ($module) {
            return Str::slug($module['name']);
        },
        'is_bonus' => $faker->boolean(20),
    ];
});
