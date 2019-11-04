<?php

use App\Module;
use App\OperatingSystem;
use App\Resource;
use Faker\Generator as Faker;

$factory->define(Resource::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'url' => $faker->url,
        'is_free' => $faker->boolean,
        'is_bonus' => $faker->boolean(20),
        'type' => $faker->randomElement(Resource::TYPES),
        'module_id' => factory(Module::class),
        'language' => $faker->randomElement(['en', 'es']),
        'os' => $faker->randomElement(OperatingSystem::ALL),
    ];
});
