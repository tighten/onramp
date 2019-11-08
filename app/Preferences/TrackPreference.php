<?php

namespace App\Preferences;

use App\Track;

class TrackPreference extends Preference
{
    public function options()
    {
        return Track::all();
    }

    public function default()
    {
        return Track::first();
    }
}
