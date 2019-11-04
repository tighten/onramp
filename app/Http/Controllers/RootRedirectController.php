<?php

namespace App\Http\Controllers;

use Facades\App\Preferences\LocalePreference;
use Illuminate\Http\Request;

class RootRedirectController extends Controller
{
    public function __invoke(Request $request)
    {
        if (auth()->user()) {
            return redirect(Preferences::get(LocalePreference::key()));
        }

        return redirect(LocalePreference::default());
    }
}
