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
            //     plus session_commit()n plus cookie?? aghhhh so much to do.
            //
            //     Also I hate these giant camel sentences. Maybe a view composer?
            //     Whatever we decide, let's then test it.
            'currentResourceLanguagePreference' => Preferences::get('resource-language-preference'),
            'resourceLanguagePreferences' => Preferences::preferences()['resource-language-preference']['options'],
        ]);
    }

    // @todo make this work better for ajax? overloading feels weird
    public function store(Request $request)
    {
        Preferences::set([
            'resource-language-preference' => $request->input('resource-language-preference'),
        ]);

        if ($request->wantsJson()) {
            return response()->json(['status' => 'success']);
        }

        return back();
    }
}
