<?php

namespace App\Http\Controllers\Auth;

use App\Localization\Locale;
use Illuminate\Validation\Rule;
use Facades\App\OperatingSystem;
use App\Http\Controllers\Controller;

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
        auth()->user()->preferences([
            'language' => $valid['locale'],
        ]);

        return redirect("{$valid['locale']}/{$this->redirectTo}");
    }
}
