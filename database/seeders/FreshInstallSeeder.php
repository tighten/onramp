<?php

namespace Database\Seeders;

use App\Models\Track;
use App\Models\User;
use Illuminate\Database\Seeder;

class FreshInstallSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create([
            'email' => 'matt@tighten.co',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        $tracks = [
            'New to Programming',
            'Frontend Developers',
            'WordPress Developers',
        ];

        foreach ($tracks as $track) {
            Track::factory()->create(['name' => $track]);
        }

        $this->call(ExistingContentSeeder::class);
    }
}
