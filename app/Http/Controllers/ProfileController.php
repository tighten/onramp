<?php

namespace App\Http\Controllers;

class ProfileController extends Controller
{
    public function show()
    {
        return view('profile');
    }

    public function update()
    {
        $validated = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        auth()->user()->update($validated);

        return redirect(route_wlocale('user.profile.show'));
    }
}
