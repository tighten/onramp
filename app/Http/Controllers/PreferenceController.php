<?php

namespace App\Http\Controllers;

use App\Facades\Preferences;
use App\Localization\Locale;
use Facades\App\Preferences\LocalePreference;
use Facades\App\Preferences\ResourceLanguagePreference;
use Illuminate\Http\Request;

class PreferenceController extends Controller
{
    public function index()
    {
        return view('preferences', [
            'currentResourceLanguagePreference' => Preferences::get(ResourceLanguagePreference::key()),
            'resourceLanguagePreferences' =>  ResourceLanguagePreference::options(),
            'preferredLocale' => Preferences::get(LocalePreference::key()),
        ]);
    }

    public function store(Request $request)
    {
        Preferences::set([
            ResourceLanguagePreference::key() => $request->input(ResourceLanguagePreference::key()),
            LocalePreference::key() => $request->input(LocalePreference::key()),
        ]);

        if ($request->wantsJson()) {
            return response()->json(['status' => 'success']);
        }

        return back();
    }
}
