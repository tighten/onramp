<?php

namespace App;

use Exception;
use Illuminate\Support\Arr;

class Preferences
{
    protected $user;

    // @todo: These keys feel like magic strings. Let's consider making them constants
    protected $preferences = [
        'resource-language-preference' => [
            'options' => [
                // @todo make these translatable
                'local' => 'Only resources for my language',
                'all' => 'All resources',
                'local-and-english' => 'Only resources for my language and English',
            ],
            'default' => 'local',
        ],
        'language' => [
            // @todo figure out how we do options that are db-stored.. do we just skip
            // the options key and then it allows all options?
            'default' => 'english',
        ],
    ];

    public function __construct(User $user = null)
    {
        $this->user = $user;
        $this->translatePreferences();
    }

    protected function translatePreferences()
    {
        $this->preferences = collect($this->preferences)->map(function ($preference) {
            // Translate the descriptions of each option
            $options = collect(Arr::get($preference, 'options', []));
            $preference['options'] = $options->flatMap(function ($value, $key) {
                return [$key => __($value)];
            })->toArray();

            return $preference;
        })->toArray();
    }

    public function preferences()
    {
        return $this->preferences;
    }

    public function set(array $array)
    {
        $this->checkKeys(array_keys($array));

        $this->user->preferences = array_merge((array) $this->user->preferences, $array);
        $this->user->save();
    }

    public function get($key, $default = null)
    {
        $this->checkKeys([$key]);

        return data_get(
            $this->user->preferences,
            $key,
            $this->defaultForKey($key, $default)
        );
    }

    public function defaultForKey($key, $defaultOverride = null)
    {
        return $defaultOverride ?? $this->preferences[$key]['default'];
    }

    protected function checkKeys($keys)
    {
        foreach ($keys as $key) {
            if (! array_key_exists($key, $this->preferences)) {
                throw new Exception('Preference key ' . $key . ' not defined.');
            }
        }
    }
}
