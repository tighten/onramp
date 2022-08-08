<?php

namespace App\Console\Commands;

use App\Models\Resource;
use Illuminate\Console\Command;

class GetExpiredResources extends Command
{
    protected $signature = 'resources:expired {--N|notify}';

    protected $description = 'List or notify Tighten of expired resources.';

    public function handle()
    {
        $expiredResources = Resource::expired()->get([
                'name',
                'url',
                'expiration_date',
                'created_at',
            ]);

        if (! count($expiredResources)) {
            $this->info('All resources are up to date!');
            return;
        }

        if ($this->option('notify')) {
            return;
        }

        $this->table(
            ['Resource Name', 'URL', 'Expired On', 'Created On'],
            $expiredResources->each->setAppends([])->toArray(),
        );
    }
}
