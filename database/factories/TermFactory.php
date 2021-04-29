<?php

namespace Database\Factories;

use App\Term;
use Faker\Factory;
use Illuminate\Database\Eloquent\Factories\Factory;

class TermFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Term::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $spanishFaker = Factory::create('es_ES');

        return [
            'name' => [
                'en' => $this->faker->word,
                'es' => $spanishFaker->word,
            ],
            'description' => [
                'en' => $this->faker->paragraph,
                'es' => $spanishFaker->paragraph,
            ],
        ];
    }
}
