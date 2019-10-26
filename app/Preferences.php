<?php

namespace App;

use Exception;

class Preferences
{
    protected $user;

    protected $preferences = [
        'resource-language-preference' => [
            'options' => [
                // @todo make these translatable
                'local' => 'Only local resources',
                'all' => 'All resources',
                'local-and-english' => 'Only local and English resources',
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
    }

    public function preferences()
    {
        return $this->preferences;
    }

    public function set(array $array)
    {
        $this->checkKeys(array_keys($array));

        $this->user->update([
            'preferences' => array_merge((array) $this->user->preferences, $array),
        ]);
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
