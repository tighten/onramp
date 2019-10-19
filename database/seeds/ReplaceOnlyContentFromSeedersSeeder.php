<?php

use Illuminate\Database\Seeder;

class ReplaceOnlyContentFromSeedersSeeder extends Seeder
{
    public function run()
    {
        if (! $this->command->confirm('Are you sure? This will truncate all content.')) {
            $this->command->info('Exiting early.');
            return;
        }
        // @todo Can't do this once we add checkboxes--then we'll need Nova or something similar

        Schema::disableForeignKeyConstraints();
        DB::table('module_track')->truncate();
        DB::table('skills')->truncate();
        DB::table('resources')->truncate();
        DB::table('modules')->truncate();
        DB::table('terms')->truncate();
        Schema::enableForeignKeyConstraints();

        $this->call(ExistingContentSeeder::class);
    }
}
