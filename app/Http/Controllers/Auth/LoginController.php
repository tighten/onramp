<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Facades\Preferences;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;

    public function redirectTo()
    {
        return Preferences::get('locale') . '/modules';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
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
        $user = Socialite::driver('github')->user();

        if (! User::where('github_user_id', $user->getId())->exists()) {
            if (! User::where('github_username', $user->getNickname())->exists()) {
                User::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'github_username' => $user->getNickname(),
                    'github_avatar' => $user->getAvatar(),
                    'github_token' => encrypt($user->token),
                    'github_user_id' => $user->getId(),
                ]);
            } else {
                $storedUser = User::where('github_username', $user->getNickname());
                $storedUser->update(['github_user_id' => $user->getId()]);
            }
        }

        Auth::login(User::firstWhere('github_user_id', $user->getId()), true);

        return redirect()->intended();
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
