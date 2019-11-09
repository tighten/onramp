<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $type = $this->command->choice('Do you want to seed a new install, or update an old install with new content?', ['new' => 'New install', 'old' => 'Old install']);

        if ($type == 'new') {
            $this->call(FreshInstallSeeder::class);
        } else {
            $this->call(ReplaceOnlyContentFromSeedersSeeder::class);
        }
    }
}
