<?php

namespace App\Http\Controllers;

use App\Facades\Preferences;
use Illuminate\Http\Request;

class PreferenceController extends Controller
{
    public function index()
    {
        return view('preferences', [
            // @todo but how do we handle that compared to the language they're ON right now URL-wise?
            //     plus session plus cookie?? aghhhh so much to do.
            'currentResourceLanguagePreference' => Preferences::get('resource-language-preference'),
            'resourceLanguagePreferences' => Preferences::preferences()['resource-language-preference']['options'],
        ]);
    }

    public function store(Request $request)
    {
        Preferences::set([
            'resource-language-preference' => $request->input('language_preference'),
        ]);

        return back();
    }
}
