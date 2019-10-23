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

    public function store(Request $request)
    {
        $language = $request->input('lang_pref');
        $user = $request->user();
        $user->preference()->updateOrCreate(['user_id' => $user->id], compact('language'));

        return back();
    }
}
