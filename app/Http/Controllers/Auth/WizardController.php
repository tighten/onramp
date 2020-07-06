<?php

namespace App\Http\Controllers\Auth;

use App\Facades\Preferences;
use App\Http\Controllers\Controller;
use App\Localization\Locale;
use App\OperatingSystem;
use Illuminate\Validation\Rule;

class WizardController extends Controller
{
    protected $redirectTo = 'modules';

    public function index()
    {
        return view('wizard');
    }

    public function store()
    {
        $valid = $this->validate(request(), [
            'os' => ['required', 'string', Rule::in(OperatingSystem::ALL)],
            'track' => ['required', 'int', 'exists:tracks,id'],
            'locale' => ['required', 'string', Rule::in((new Locale)->slugs())]
        ], [], [
            'os' => 'OS'
        ]);

        auth()->user()->update(['track_id' => $valid['track']]);

        Preferences::set([
            'locale' => $valid['locale'],
            'operating-system' => $valid['os'],
        ]);

        return redirect("{$valid['locale']}/{$this->redirectTo}");
    }
}
