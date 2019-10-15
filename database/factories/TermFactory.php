<?php

use App\Term;
use Faker\Factory;
use Faker\Generator;

$factory->define(Term::class, function (Generator $faker) {
    $spanishFaker = Factory::create('es_ES');

    return [
        'name' => [
            'en' => $faker->word,
            'es' => $spanishFaker->word,
        ],
        'description' => [
            'en' => $faker->paragraph,
            'es' => $spanishFaker->paragraph,
        ],
    ];
});
