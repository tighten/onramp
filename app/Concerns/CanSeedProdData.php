<?php

namespace  App\Concerns;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

trait CanSeedProdData
{
    /**
     * Seed local database from JSON seeder files
     */
    protected function seed(Command $command, array $seeds): void
    {
        Schema::disableForeignKeyConstraints();

        foreach ($seeds as $seed) {
            $filename = $seed->getFilename();
            $tableName = Str::before($filename, '.'.config('seeder.extension'));

            $command->line("Seeding {$tableName}...");

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
                } catch (Exception $e) {
                    Log::warning($e->getMessage());
                    break;
                }
            }

            $command->info('Seeding successful!'.PHP_EOL);
        }

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Get seeder files to populate local database with
     */
    protected function getSeedFiles(string $dir, array $tables = []): array
    {
        $files = File::files($dir);

        if (! empty($tables)) {
            $files = array_filter($files, static function ($file) use ($tables) {
                $search = Str::before($file->getFileName(), '.');

                return in_array($search, $tables);
            });
        }

        return array_values($files);
    }
}
