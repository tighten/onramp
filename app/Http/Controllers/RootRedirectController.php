<?php

namespace App\Http\Controllers;

use App\Facades\Preferences;
use App\Preferences\LocalePreference;

class RootRedirectController extends Controller
{
    public function __invoke()
    {
        if (auth()->check()) {
            return redirect(Preferences::get('locale'));
        }

        return redirect((new LocalePreference)->default());
    }
}
