<?php

use App\SuggestedResource;
use Faker\Generator as Faker;

$factory->define(SuggestedResource::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'url' => $faker->url,
        'language' => $faker->randomElement(array_merge(['all'], Localization::slugs())),
    ];
});
