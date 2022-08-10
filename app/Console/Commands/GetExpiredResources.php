<?php

namespace App\Console\Commands;

use App\Models\Resource;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Event;

class GetExpiredResources extends Command
{
    protected $signature = 'resource:expired {--N|notify}';

    protected $description = 'List or notify Tighten of expired resources.';

    public function handle()
    {
        $expiredResources = Resource::expired()
            ->orWhere(function ($query) {
                $query->expiring();
            })
            ->with('modules')
            ->get([
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
            Event::dispatch('send-expired-resources', [$expiredResources]);
            return;
        }

        $this->table(
            ['Resource Name', 'URL', 'Days Til Expired'],
            $expiredResources->each
                ->setAppends(['days_til_expired'])
                ->makeHidden(['modules', 'created_at', 'expiration_date'])
                ->toArray(),
        );
    }
}
