<?php

namespace App\Http\Controllers;

use App\Facades\Preferences;
use Illuminate\Http\Request;
use App\Preferences\ResourceLanguagePreference;

class PreferenceController extends Controller
{
    public function index()
    {
        return view('preferences', [
            'currentResourceLanguagePreference' => Preferences::get('resource-language'),
            'resourceLanguagePreferences' => (new ResourceLanguagePreference)->options(),
            'preferredLocale' => Preferences::get('locale'),
        ]);
    }

    public function store(Request $request)
    {
        Preferences::set([
            'resource-language' => $request->input('resource-language'),
            'locale' => $request->input('locale'),
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
