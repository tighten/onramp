<?php

namespace Database\Seeders;

use App\Concerns\CanSeedProdData;
use App\Models\User;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    use CanSeedProdData;

    public function run(): void
    {
        User::factory()->create([
            'email' => 'matt@tighten.co',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        $seedsDirectory = config('seeder.directory', 'database/json');

        $seeds = $this->getSeedFiles($seedsDirectory);

        if (! $seeds) {
            $this->command->warn('The directory '.$seedsDirectory.' is empty.');
            $this->command->line('You can create seeds from the production database by calling <info>php artisan generate:seeds-from-db --all</info>');

            return 0;
        }

        $this->seed($this->command, $seeds);
    }
}
