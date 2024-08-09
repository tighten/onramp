<?php

namespace App\Http\Controllers;

use App\Facades\Preferences;
use App\Preferences\ResourceLanguagePreference;
use Illuminate\Http\Request;
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

            $user->is_subscriber = $request->has('digest-subscriber');

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

    public function unsubscribe(Request $request)
    {
        $user = auth()->user();

        if ($user) {
            $user->is_subscriber = false;
            $user->save();

            session()->flash('toast', 'You have been unsubscribed.');

            if ($request->wantsJson()) {
                return response()->json(['status' => 'success']);
            }

            return redirect()->route('home');
        }

        return redirect()->route('login');
    }
}
