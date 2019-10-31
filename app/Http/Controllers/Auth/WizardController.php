<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Localization\Locale;
use App\OperatingSystem;
use Illuminate\Validation\Rule;

class WizardController extends Controller
{
    protected $redirectTo = 'home';
    
    public function __invoke()
    {
        $valid = $this->validate(request(), [
            'os' => ['required', 'string', Rule::in(OperatingSystem::keys())],
            'track' => ['required', 'int', 'exists:tracks,id'],
            'locale' => ['required', 'string', Rule::in((new Locale())->slugs())]
        ], [], [
            'os' => 'OS'
        ]);

        auth()->user()->update([
            'os' => $valid['os'],
            'track_id' => $valid['track']
        ]);
        // @todo Add language save. Waiting on PR#103.

        return redirect(path_wlocale($this->redirectTo));
    }
}
