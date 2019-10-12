<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Term;
use Faker\Generator as Faker;

$factory->define(Term::class, function (Faker $faker) {
    return [
        'name' => [
            'en' => $faker->word,
            'es' => $faker->word
        ],
        'description' => [
            'en' => implode(' ', $faker->sentences),
            'es' => implode(' ', $faker->sentences)
        ],
    ];
});
