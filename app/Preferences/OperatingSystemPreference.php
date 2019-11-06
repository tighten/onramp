<?php

namespace App\Preferences;

use App\OperatingSystem;

class OperatingSystemPreference extends Preference
{
    public function options()
    {
        return OperatingSystem::ALL;
    }

    public function default()
    {
        return OperatingSystem::ANY;
    }
}
