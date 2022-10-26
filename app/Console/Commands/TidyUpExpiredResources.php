<?php

namespace App\Console\Commands;

use App\Models\Resource;
use Illuminate\Console\Command;

class TidyUpExpiredResources extends Command
{
    private $expiredResourcesCount;

    private $trashedResourcesCount;

    protected $signature = 'resource:tidy {--P|prune} {--preview}';

    protected $description = 'Soft or force delete expired resources. Use the --preview option to view the full expired resources report.';

    public function handle()
    {
        $expiredResources = Resource::expired()->withTrashed()->get();

        if (! $this->expiredResourcesCount = count($expiredResources)) {
            return $this->info('No resources to tidy up.');
        }

        if ($this->option('preview')) {
            return $this->call('resource:expired', [
                '--trashed' => true,
            ]);
        }

        if ($this->pruneExpiredResources()) {
            $this->withProgressBar($expiredResources, fn($resource) => $resource->forceDelete());

            return $this->info(PHP_EOL . 'Done!');
        }

        $this->trashedResourcesCount = Resource::expired()->onlyTrashed()->count();

        if ($this->expiredResourcesCount === $this->trashedResourcesCount) {
            $this->info('No resources to tidy up. There are ' . $this->trashedResourcesCount . ' resources in the trash. To permanently delete them, use the --prune option.');

            return;
        }

        $this->withProgressBar(Resource::expired()->get(), fn($resource) => $resource->delete());

        $this->info(PHP_EOL . 'Done! To permanently delete resources moved to the trash, use the --prune option.');
    }

    private function pruneExpiredResources(): bool
    {
        return $this->option('prune') && $this->confirm('You are permanently removing ' . $this->expiredResourcesCount . ' expired resources. This action can not be reversed. Continue?');
    }
}
