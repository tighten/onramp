<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        if (app()->environment() === 'production') {
            $this->command->comment('**************************************');
            $this->command->comment('*   Confirm Seeding In Production!   *');
            $this->command->comment('**************************************');

            if (! $this->command->confirm('Are you sure you want to run this in production? It will wipe everything!')) {
                exit('Seeding cancelled.');
            }
        }

        $this->call(FreshInstallSeeder::class);
    }
}
