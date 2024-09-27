<?php

namespace App\Http\Controllers;

use App\Facades\Preferences;
use App\Preferences\ResourceLanguagePreference;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PreferenceController extends Controller
{
    public function index(): View
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

        $user = auth()->user();

        if ($user) {
            if ($request->filled('track')) {
                $user->track_id = $request->input('track');
            }

            $request->validate([
                'is_subscriber' => 'nullable|boolean',
            ]);

            $user->is_subscriber = $request->has('digest-subscriber');

            if ($user->is_subscriber) {
                $user->unsubscribe_token = Str::random(60);
            } else {
                $user->unsubscribe_token = null;
            $user->unsubscribe_token = $user->is_subscriber ? Str::random(60) : null;

            $user->save();
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
