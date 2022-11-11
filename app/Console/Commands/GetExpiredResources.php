<?php

namespace App\Console\Commands;

use App\Models\Resource;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Event;

class GetExpiredResources extends Command
{
    protected $signature = 'resource:expired {--N|notify} {--T|trashed}';

    protected $description = 'List or notify Tighten of expired resources. Use the --trashed option to view resources that have been soft deleted.';

    protected $outputHeaders = [
        'Resource Name',
        'URL',
        'Days Til Expired',
    ];

    protected $outputAppends = [
        'days_til_expired',
    ];

    public function handle()
    {
        $expiredResources = Resource::expired()
            ->orWhere(function ($query) {
                $query->expiring();
            })
            ->when($this->option('trashed'), function ($query) {
                return $query->withTrashed();
            })
            ->with('modules')
            ->oldest('expiration_date')
            ->get([
                'name',
                'url',
                'expiration_date',
                'created_at',
                'deleted_at',
            ]);

        if (! count($expiredResources)) {
            $this->info('All resources are up to date!');
            return;
        }

        if ($this->option('notify')) {
            Event::dispatch('send-expired-resources', [$expiredResources]);
            return;
        }

        if ($this->option('trashed')) {
            array_push($this->outputHeaders, 'Trashed');
            array_push($this->outputAppends, 'is_trashed');
        }

        $this->table(
            $this->outputHeaders,
            $expiredResources->each
                ->setAppends($this->outputAppends)
                ->makeHidden(['modules', 'created_at', 'expiration_date', 'deleted_at'])
                ->toArray(),
        );
    }
}
