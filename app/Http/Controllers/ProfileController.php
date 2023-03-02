<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProfileController extends Controller
{
    public function show(): View
    {
        return view('profile');
    }

    public function update(): RedirectResponse
    {
        $validated = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        auth()->user()->update($validated);

        return redirect(route_wlocale('user.profile.show'));
    }
}
