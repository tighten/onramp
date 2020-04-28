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
        Preferences::set(
            collect($request->only(Preferences::getValidKeys()))->filter()
        );

        if (auth()->user() && $request->filled('track')) {
            auth()->user()->track_id = $request->input('track');

            auth()->user()->save();
        }

        session()->flash('toast', 'Your preferences were saved.');

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
