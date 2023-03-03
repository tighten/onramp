<?php

namespace App\Preferences;

use App\Models\User;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cookie;

class Preferences
{
    protected $preferences = [
        'locale' => LocalePreference::class,
        'operating-system' => OperatingSystemPreference::class,
        'resource-language' => ResourceLanguagePreference::class,
    ];

    protected $user;

    protected $cookieLength = 43200; // one month-ish

    public function __construct(User $user = null)
    {
        $this->user = $user;
    }

    public function set($preferences)
    {
        if ($preferences instanceof Collection) {
            $preferences = $preferences->toArray();
        }

        foreach ($preferences as $key => $value) {
            $this->preferenceForKey($key)->validate($value);
            Cookie::queue($this->cookieNameForKey($key), $value, $this->cookieLength);
        }

        if ($this->user) {
            $this->user->preferences = array_merge((array) $this->user->preferences, $preferences);
            $this->user->save();
        }
    }

    public function get($key, $default = null)
    {
        if (! array_key_exists($key, $this->preferences)) {
            throw new Exception('Invalid preferences key: ' . $key);
        }

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
        if (array_key_exists($key, $this->preferences)) {
            return new $this->preferences[$key];
        }

        throw new Exception('No preference matching key ' . $key);
    }

    public function cookieNameForKey($key)
    {
        return 'PREFERENCES::' . $key;
    }

    public function getValidKeys()
    {
        return array_keys($this->preferences);
    }
}
