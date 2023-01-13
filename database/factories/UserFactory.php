<?php

namespace Database\Factories;

use App\Models\Track;
use App\Models\User;
use App\OperatingSystem;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'role' => Arr::random(['admin', 'editor', 'user']),
            'track_id' => function () {
                if (! $this->faker->boolean) {
                    return null;
                }

                return Track::factory()->create()->id;
            },
            'preferences' => function () {
                return [
                    'resource-language' => Arr::random([
                        'local',
                        'all',
                        'local-and-english',
                    ]),
                    'os' => Arr::random(OperatingSystem::ALL),
                ];
            },
        ];
    }
}
