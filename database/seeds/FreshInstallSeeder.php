<?php

use App\Track;
use App\User;
use Illuminate\Database\Seeder;

class FreshInstallSeeder extends Seeder
{
    public function run()
    {
        factory(User::class)->create([
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
            factory(Track::class)->create(['name' => $track]);
        }

        $this->call(ExistingContentSeeder::class);
    }
}
