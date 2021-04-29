<?php

namespace Database\Factories;

use App\Module;
use App\Skill;
use Illuminate\Database\Eloquent\Factories\Factory;

class SkillFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Skill::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'is_bonus' => $this->faker->boolean(20),
            'module_id' => Module::factory(),
        ];
    }
}
