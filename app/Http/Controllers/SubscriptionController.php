<?php

namespace App\Http\Controllers;

use App\Models\User;

class SubscriptionController extends Controller
{
	public function destroy($locale, $token)
	{
		$user = User::where('unsubscribe_token', $token)->first();

		$user->is_subscriber = false;
		$user->unsubscribe_token = null;
		$user->save();

		session()->flash('toast', 'You have been unsubscribed.');

		return redirect()->route('welcome', ['locale' => $locale]);
	}
}
