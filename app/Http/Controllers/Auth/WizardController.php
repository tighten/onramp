<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Localization\Locale;
use App\OperatingSystem;
use Facades\App\Preferences;
use Facades\App\Preferences\LocalePreference;
use Illuminate\Validation\Rule;

class WizardController extends Controller
{
    protected $redirectTo = 'home';

    public function index()
    {
        return view('wizard');
    }

    public function store()
    {
        $valid = $this->validate(request(), [
            'os' => ['required', 'string', Rule::in(array_keys(OperatingSystem::ALL))],
            'track' => ['required', 'int', 'exists:tracks,id'],
            'locale' => ['required', 'string', Rule::in((new Locale)->slugs())]
        ], [], [
            'os' => 'OS'
        ]);

        auth()->user()->update([
            'os' => $valid['os'],
            'track_id' => $valid['track'],
        ]);

        Preferences::set(LocalePreference::key(), $valid[LocalePreference::key()]);

        return redirect("{$valid[LocalePreference::key()]}/{$this->redirectTo}");
    }
}
