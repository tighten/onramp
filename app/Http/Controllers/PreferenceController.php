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
        ]);
    }

    public function update(Request $request)
    {
        $validKeys = $request->only(Preferences::getValidKeys());

        $filtered = array_filter($validKeys, function($val){
            return $val !== null;
        });

        Preferences::set($filtered);

        if (auth()->user() && $request->filled('track')) {
            auth()->user()->track_id = $request->input('track');

            auth()->user()->save();
        }

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
