<?php

namespace App\Http\Controllers;

use App\Facades\Preferences;
use App\Localization\Locale;
use Facades\App\Preferences\LanguagePreference;
use Facades\App\Preferences\ResourceLanguagePreference;
use Illuminate\Http\Request;

class PreferenceController extends Controller
{
    public function index()
    {
        return view('preferences', [
            'currentResourceLanguagePreference' => Preferences::get(ResourceLanguagePreference::key()),
            'resourceLanguagePreferences' =>  ResourceLanguagePreference::options(),
            'preferredLocale' => Preferences::get(LanguagePreference::key()),
            'locale' => new Locale, // @todo wat?
        ]);
    }

    public function store(Request $request)
    {
        Preferences::set([
            ResourceLanguagePreference::key() => $request->input(ResourceLanguagePreference::key()),
            LanguagePreference::key() => $request->input(LanguagePreference::key()),
        ]);

        if ($request->wantsJson()) {
            return response()->json(['status' => 'success']);
        }

        return back();
    }
}
