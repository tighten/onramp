<?php

namespace App\Http\Controllers;

use App\Facades\Preferences;
use App\Preferences\ResourceLanguagePreference;
use Illuminate\Http\Request;

class PreferenceController extends Controller
{
    public function index()
    {
        return view('preferences', [
            'currentResourceLanguagePreference' => Preferences::get('resource-language-preference'),
            'resourceLanguagePreferences' => (new ResourceLanguagePreference)->options(),
        ]);
    }

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
