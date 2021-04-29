<?php

namespace Database\Factories;

use App\SuggestedResource;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Facades\Localization;

class SuggestedResourceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SuggestedResource::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'url' => $this->faker->url,
            'language' => $this->faker->randomElement(array_merge(['all'], Localization::slugs())),
            'is_free' => $this->faker->boolean,
        ];
    }
}
