<?php

namespace App\Http\Controllers;

use App\Models\User;

class SubscriptionController extends Controller
{
    public function destroy($locale, $token)
    {
        $user = User::where('unsubscribe_token', $token)->first();

        $user->update([
            'is_subscriber' => false,
            'unsubscribe_token' => null,
        ]);

        // session()->flash('toast', 'You have been unsubscribed.');

        return redirect()->route('welcome', ['locale' => $locale]);
    }
}
