<?php

namespace Database\Factories;

use App\Models\Resource;
use App\OperatingSystem;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'language' => $this->faker->randomElement(['en', 'es']),
            'os' => $this->faker->randomElement(OperatingSystem::ALL),
            'can_expire' => true,
        ];
    }


    public function doesntExpire()
    {
        return $this->state(function (array $attributes) {
            return [
                'can_expire' => false,
                'expiration_date' => null,
            ];
        });
    }

    public function expired()
    {
        Carbon::setTestNow(Carbon::today());

        return $this->state(function (array $attributes) {
            return [
                'can_expire' => true,
                'expiration_date' => Carbon::now()->subDays(1),
            ];
        });
    }

    public function expiring()
    {
        Carbon::setTestNow(Carbon::today());

        return $this->state(function (array $attributes) {
            return [
                'can_expire' => true,
                'expiration_date' => Carbon::now()->addDays(14),
            ];
        });
    }
}
