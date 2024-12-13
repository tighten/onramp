<?php

namespace App\Http\Controllers\Auth;

use App\Facades\Preferences;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo()
    {
        return Preferences::get('locale') . '/modules';
    }

    public function showLoginForm(): View
    {
        return view('auth.login', [
            'pageTitle' => __('Log in'),
        ]);
    }

    public function redirectToProvider()
    {
        session()->flash('url.intended', route_wlocale('wizard.index'));

        return Socialite::driver('github')->redirect();
    }

    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('github')->user();

            $userExists = true;

            if (User::where('email', $user->getEmail())->exists()) {
                if (! User::where('github_user_id', $user->getId())->exists()) {
                    User::where('email', $user->getEmail())
                        ->update([
                            'github_username' => $user->getNickname(),
                            'github_avatar' => $user->getAvatar(),
                            'github_token' => encrypt($user->token),
                            'github_user_id' => $user->getId(),
                        ]);
                }
            } else {
                $newUser = User::create([
                    'name' => $user->getName() ?: $user->getNickName(),
                    'email' => $user->getEmail(),
                    'github_username' => $user->getNickname(),
                    'github_avatar' => $user->getAvatar(),
                    'github_token' => encrypt($user->token),
                    'github_user_id' => $user->getId(),
                ]);

                Event::dispatch('new-signup', [$newUser, app('request')]);

                $userExists = false;
            }

            Auth::login(User::firstWhere('github_user_id', $user->getId()), true);

            return $userExists ? redirect(route_wlocale('modules.index')) : redirect()->intended();
        } catch (Exception $e) {
            if (request()->has('code') && request()->has('state')) {
                Log::error($e);

                // session()->flash('toast-title', 'GitHub Error');
                // session()->flash('toast', 'There was an error authenticating with GitHub.');
            }

            return redirect(route_wlocale('login'));
        }
    }

    /**
     * The user has logged out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    protected function loggedOut()
    {
        return redirect(locale());
    }
}
