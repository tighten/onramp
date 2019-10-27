<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Localization\Locale;
use Illuminate\Validation\Rule;

class WizardController extends Controller
{
    protected $redirectTo = 'home';
    
    public function __invoke()
    {
        $valid = $this->validate(request(), [
            'os' => ['required', 'string', 'in:any,osx,linux,windows'],
            'track' => ['required', 'int', 'exists:tracks,id', 'min:1'],
            'locale' => ['required', 'string', Rule::in((new Locale())->slugs())]
        ], [], [
            'os' => 'OS'
        ]);
        $user = auth()->user();
        $user->os = $valid['os'];
        $user->track_id = $valid['track'];
        // TODO: Add language save. Waiting on PR#103.
        $user->save();
        return redirect(path_wlocale($this->redirectTo));
    }
}
