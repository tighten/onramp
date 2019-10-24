<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PreferenceController extends Controller
{
    public function index(Request $request)
    {
        return view('preferences', [
            'currentLanguagePreference' => auth()->user()->preference->language,
            'languagePreferences' => auth()->user()->preference->languagePreferences(),
        ]);
    }

    public function store()
    {
        auth()->user()->preference()->updateOrCreate(
            ['user_id' => auth()->user()->id],
            ['language' => request('lang_pref')]
        );

        return back();
    }
}
