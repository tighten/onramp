<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PreferenceController extends Controller
{
    public function index(Request $request)
    {
        return view('preferences', [
            // @todo but how do we handle that compared to the language they're ON right now?
            //     plus session plus cookie?? aghhhh so much to do.
            'currentLanguagePreference' => auth()->user()->preferences('language'),
            'languagePreferences' => auth()->user()->preferences('resource-language-preference'),
        ]);
    }

    public function store()
    {
        auth()->user()->preferences([
            // @todo I don't like this shortened lang_pref
            'resource-language-preference' => request('lang_pref'),
        ]);

        return back();
    }
}
