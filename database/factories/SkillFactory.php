<?php

use App\Module;
use App\Skill;
use Faker\Generator as Faker;

$factory->define(Skill::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'is_bonus' => $faker->boolean(20),
        'module_id' => factory(Module::class),
    ];
});
