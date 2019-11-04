<?php

namespace App\Preferences;

use App\User;
use Exception;
use Illuminate\Support\Facades\Cookie;

class Preferences
{
    protected $user;
    protected $preferences = [
        ResourceLanguagePreference::class,
        LanguagePreference::class,
    ];
    protected $preferencesInstances = [];
    protected $cookieLength = 43200; // one month-ish

    public function __construct(User $user = null)
    {
        $this->user = $user;

        foreach ($this->preferences as $class) {
            $this->preferencesInstances[] = new $class;
        }
    }

    public function set(array $array)
    {
        foreach ($array as $key => $value) {
            $this->preferenceForKey($key)->validate($value);
            Cookie::queue($this->cookieNameForKey($key), $value, $this->cookieLength);
        }

        if ($this->user) {
            $this->user->preferences = array_merge((array) $this->user->preferences, $array);
            $this->user->save();
        }
    }

    public function get($key, $default = null)
    {
        if ($this->user) {
            return data_get(
                $this->user->preferences,
                $key,
                $this->defaultForKey($key, $default)
            );
        }

        return request()->cookie($this->cookieNameForKey($key), $this->defaultForKey($key, $default));
    }

    public function defaultForKey($key, $defaultOverride = null)
    {
        $preference = $this->preferenceForKey($key);

        return $defaultOverride ?? $preference->default();
    }

    public function preferenceForKey($key)
    {
        foreach ($this->preferencesInstances as $preference) {
            if ($preference->key() === $key) {
                return $preference;
            }
        }

        throw new Exception('No preference matching key ' . $key);
    }

    public function cookieNameForKey($key)
    {
        return 'PREFERENCES::' . $key;
    }
}
