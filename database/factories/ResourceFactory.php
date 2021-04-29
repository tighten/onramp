<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Module;
use App\OperatingSystem;
use App\Resource;

class ResourceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Resource::class;

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
            'is_free' => $this->faker->boolean,
            'is_bonus' => $this->faker->boolean(20),
            'type' => $this->faker->randomElement(Resource::TYPES),
            'module_id' => Module::factory(),
            'language' => $this->faker->randomElement(['en', 'es']),
            'os' => $this->faker->randomElement(OperatingSystem::ALL),
        ];
    }
}
