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
            'currentResourceLanguagePreference' => Preferences::get('resource-language'),
            'resourceLanguagePreferences' => (new ResourceLanguagePreference)->options(),
            'preferredLocale' => Preferences::get('locale'),
            'currentTrack' => Preferences::get('track'),
        ]);
    }

    public function store(Request $request)
    {
        Preferences::set([
            'resource-language' => $request->input('resource-language'),
            'locale' => $request->input('locale'),
            'operating-system' => $request->input('operating-system'),
            'track' => $request->input('track'),
        ]);

        if ($request->wantsJson()) {
            return response()->json(['status' => 'success']);
        }

        if ($request->input('locale') !== locale()) {
            return redirect(
                str_replace('/' . locale() . '/', '/' . $request->input('locale') . '/', back()->getTargetUrl())
            );
        }

        return back();
    }
}
