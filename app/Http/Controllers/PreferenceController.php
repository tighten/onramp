<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class PreferenceController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();

        return view('preferences', [
            'currentLanguagePreference' => $user->preference->language,
            'languagePreferences' => $user->preference->languagePreferences(),
        ]);
    }

    public function store(Request $request)
    {
        $language = $request->input('lang_pref');
        $user = $request->user();
        $user->preference()->updateOrCreate(['user_id' => $user->id], compact('language'));

        return back();
    }
}
