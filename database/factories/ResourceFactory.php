<?php

use App\Module;
use App\Resource;
use Faker\Generator as Faker;

$factory->define(Resource::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'url' => $faker->url,
        'is_free' => $faker->boolean,
        'type' => $faker->randomElement(['video', 'book', 'text']),
        'module_id' => factory(Module::class),
    ];
});
