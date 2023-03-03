<?php

namespace App\Console\Commands;

use App\Concerns\CanGenerateFile;
use App\Concerns\CanSeedProdData;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use STS\Tunneler\Jobs\CreateTunnel;

class GenerateSeedsFromDatabase extends Command
{
    use CanGenerateFile;
    use CanSeedProdData;

    protected const SEED_FILE_EXT = 'json';

    protected $signature = 'generate:seeds-from-db {--override} {--all}';

    protected $description = 'Sync core data and generate new seed files for local development.';

    public function __construct()
    {
        parent::__construct();

        if (app()->environment() === 'local') {
            dispatch(new CreateTunnel);
        }

        $this->dirPath = config('seeder.directory', 'database/json');
    }

    public function handle(): int
    {
        $methods = collect([
            'Modules' => 'syncModules',
            'Resources' => 'syncResources',
            'Skills' => 'syncSkills',
            'Terms' => 'syncTerms',
            'Tracks' => 'syncTracks',
            'All' => 'syncAll',
        ]);

        if ($this->option('all')) {
            $this->syncAll();

            return 0;
        }

        $option = $this->choice('Which seeder data would you like to sync?', $methods->keys()->toArray());

        $this->{$methods[$option]}();
    }

    protected function syncAll()
    {
        // sync content
        $this->line('Preparing to overwrite all seeder files ...');

        $this->syncData('modules', true);
        $this->syncData('resources', true);
        $this->syncData('skills', true);
        $this->syncData('terms', true);
        $this->syncData('tracks', true);

        // sync relationships
        $this->line('Syncing relationships ...');

        $this->syncData('module_resource', true);
        $this->syncData('module_track', true);
        $this->syncData('resource_term', true);
        $this->syncData('term_term', true);

        $this->info('Done!');
    }

    protected function syncTerms()
    {
        if ($this->syncData('terms')) {
            $this->syncData('resource_term', true);
            $this->syncData('term_term', true);

            $seeds = $this->getSeedFiles($this->dirPath, ['terms', 'resource_term', 'term_term']);

            $this->seed($this, $seeds);
        }
    }

    protected function syncModules()
    {
        if ($this->syncData('modules')) {
            $this->syncData('module_resource', true);
            $this->syncData('module_track', true);

            $seeds = $this->getSeedFiles($this->dirPath, ['modules', 'module_resource', 'module_track']);

            $this->seed($this, $seeds);
        }
    }

    protected function syncResources()
    {
        if ($this->syncData('resources')) {
            $this->syncData('module_resource', true);
            $this->syncData('resource_term', true);

            $seeds = $this->getSeedFiles($this->dirPath, ['resources', 'module_resource', 'resource_term']);

            $this->seed($this, $seeds);
        }
    }

    protected function syncSkills()
    {
        $this->syncData('skills');
    }

    protected function syncTracks()
    {
        if ($this->syncData('tracks')) {
            $this->syncData('module_track', true);

            $seeds = $this->getSeedFiles($this->dirPath, ['tracks', 'module_track']);

            $this->seed($this, $seeds);
        }
    }

    protected function syncData(string $table, bool $override = false)
    {
        $override = $this->option('override') ?: $override;

        $ext = config('seeder.extension', self::SEED_FILE_EXT);
        $seederName = $table . '.' . $ext;

        $this->line("Getting {$table} from " . config('database.connections.mysql_tunnel.database'));

        $this->line("Generating {$seederName}");

        $path = $this->createFile($table, $ext);

        if (File::exists($path)) {
            $continue = $override ?: $this->confirm("The seeder source file {$seederName} already exists. Are you sure you want to override its contents?");

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

        $this->info("{$table} synced" . PHP_EOL);

        return 1;
    }
}
