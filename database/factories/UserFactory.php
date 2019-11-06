<?php

use App\OperatingSystem;
use App\Track;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'track_id' => function () use ($faker) {
            if (! $faker->boolean) {
                return null;
            }

            return factory(Track::class)->create()->id;
        },
        'os' => $faker->randomElement(OperatingSystem::ALL),
        'preferences' => function () {
            return [
                'resource-language' => Arr::random([
                    'local',
                    'all',
                    'local-and-english',
                ]),
            ];
        },
    ];
});
