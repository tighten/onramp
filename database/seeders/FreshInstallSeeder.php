<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class FreshInstallSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create([
            'email' => 'matt@tighten.co',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        $seedsDirectory = config('seeder.directory', 'database/json');

        $seeds = $this->getSeedFiles($seedsDirectory);

        if (! $seeds) {
            $this->command->warn('The directory ' . $seedsDirectory . ' is empty.');
            $this->command->line('You can create seeds from the production database by calling <info>php artisan generate:seeds-from-db --all</info>');

            return 0;
        }

        $this->seed($seeds);
    }

    protected function seed(array $seeds)
    {
        Schema::disableForeignKeyConstraints();

        foreach ($seeds as $seed) {
            $filename = $seed->getFilename();
            $tableName = Str::before($filename, '.' . config('seeder.extension'));

            $this->command->line("Seeding $tableName...");

            $path = $seed->getRealPath();
            $content = File::get($path);
            $rows = json_decode($content, 1);

            DB::table($tableName)->truncate();

            if (empty($rows)) {
                continue;
            }

            foreach ($rows as $row) {
                try {
                    DB::table($tableName)->insert($row);
                } catch (\Exception $e) {
                    Log::warning($e->getMessage());
                    break;
                }
            }

            $this->command->info('Seeding successful!' . PHP_EOL);
        }

        Schema::enableForeignKeyConstraints();
    }

    protected function getSeedFiles(string $dir): array
    {
        $files = File::files($dir);

        return array_values($files);
    }
}
