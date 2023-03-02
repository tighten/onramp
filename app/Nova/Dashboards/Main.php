<?php

namespace App\Nova\Dashboards;

use Laravel\Nova\Dashboards\Main as Dashboard;
use Tightenco\NovaReleases\LatestRelease;
use Tightenco\SuggestedResourcesShortcuts\SuggestedResourcesShortcuts;

class Main extends Dashboard
{
    /**
     * Get the cards for the dashboard.
     *
     * @return array
     */
    public function cards(): array
    {
        return [
            new SuggestedResourcesShortcuts,
            // new LatestRelease(),
        ];
    }
}
