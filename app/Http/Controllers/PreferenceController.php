<?php

namespace App\Http\Controllers;

use App\Facades\Preferences;
use App\Preferences\LocalePreference;
use App\Preferences\ResourceLanguagePreference;
use Illuminate\Http\Request;

class PreferenceController extends Controller
{
    public function index()
    {
        $resourceLanguagePreference = new ResourceLanguagePreference;

        return view('preferences', [
            'currentResourceLanguagePreference' => Preferences::get($resourceLanguagePreference->key()),
            'resourceLanguagePreferences' => $resourceLanguagePreference->options(),
            'preferredLocale' => Preferences::get((new LocalePreference)->key()),
        ]);
    }

    public function store(Request $request)
    {
        $resourceLanguagePreferenceKey = (new ResourceLanguagePreference)->key();
        $localePreferenceKey = (new LocalePreference)->key();

        Preferences::set([
            $resourceLanguagePreferenceKey => $request->input($resourceLanguagePreferenceKey),
            $localePreferenceKey => $request->input($localePreferenceKey),
        ]);

        if ($request->wantsJson()) {
            return response()->json(['status' => 'success']);
        }

        return back();
    }
}
