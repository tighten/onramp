<?php

namespace Database\Factories;

use App\Models\Module;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Factories\Factory;

class SkillFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(),
            'is_bonus' => $this->faker->boolean(20),
            'module_id' => Module::factory(),
        ];
    }
}
