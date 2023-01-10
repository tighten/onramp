<?php

namespace App\Console\Commands;

use App\Concerns\CanGenerateFile;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use STS\Tunneler\Jobs\CreateTunnel;
use Illuminate\Support\Facades\File;

class GenerateSeedsFromDatabase extends Command
{
    use CanGenerateFile;

    protected const SEED_FILE_EXT = 'json';

    protected $signature = 'generate:seeds-from-db {--override}';

    protected $description = 'Sync core data and generate new seed files for local development.';

    public function __construct()
    {
        parent::__construct();

        dispatch(new CreateTunnel());

        $this->dirPath = 'database/seeders/prod';
    }

    public function handle()
    {
        $methods = collect([
            'Modules' => 'syncModules',
            'Resources' => 'syncResources',
            'Skills' => 'syncSkills',
            'Terms' => 'syncTerms',
            'Tracks' => 'syncTracks',
            'All' => 'syncAll',
        ]);

        $option = $this->choice('Which seeder data would you like to sync?', $methods->keys()->toArray());

        $this->{$methods[$option]}();

        // call artisan command to update seeder and run
    }

    private function syncAll()
    {
        $this->line('Preparing to overwrite all seeder files ...');

        $this->syncData('modules', true);
        $this->syncData('resources', true);
        $this->syncData('skills', true);
        $this->syncData('terms', true);
        $this->syncData('tracks', true);

        $this->info('Done!');
    }

    private function syncTerms()
    {
        $this->syncData('terms');
    }

    private function syncModules()
    {
        $this->syncData('modules');
    }

    private function syncResources()
    {
        $this->syncData('resources');
    }

    private function syncSkills()
    {
        $this->syncData('skills');
    }

    private function syncTracks()
    {
        $this->syncData('tracks');
    }

    private function syncData(string $table, bool $override = false)
    {
        $override = $this->option('override') ?: $override;

        $seederName = $table . '.' . self::SEED_FILE_EXT;

        $this->line("Getting $table from " . config('database.connections.mysql_tunnel.database'));

        $this->line("Generating $seederName");

        $path = $this->createFile($table, self::SEED_FILE_EXT);

        if (File::exists($path)) {
            $continue = $override ?: $this->confirm("The seeder source file $seederName already exists. Are you sure you want to override its contents?");

            if (! $continue) {
                $this->info('Goodbye!');
                return 0;
            }
        }

        $data = DB::connection('mysql_tunnel')
            ->table($table)
            ->orderBy('id')
            ->chunkMap(function ($item) {
                return $item;
            });

        File::put($path, json_encode($data->toArray()));

        $this->info("$table synced" . PHP_EOL);
    }
}
