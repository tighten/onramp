<?php

use App\Module;
use App\Resource;
use Facades\App\ResourceType;
use Faker\Generator as Faker;

$factory->define(Resource::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'url' => $faker->url,
        'is_free' => $faker->boolean,
        'is_bonus' => $faker->boolean(20),
        'type' => $faker->randomElement(ResourceType::values()),
        'module_id' => factory(Module::class),
        'language' => $faker->randomElement(['en', 'es']),
    ];
});
