<?php

namespace Database\Factories;

use App\Models\Term;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class TermFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $spanishFaker = Faker::create('es_ES');

        return [
            'name' => [
                'en' => $this->faker->word(),
                'es' => $spanishFaker->word,
            ],
            'description' => [
                'en' => $this->faker->paragraph(),
                'es' => $spanishFaker->paragraph,
            ],
        ];
    }
}
