<?php

namespace App;

class OperatingSystem
{
    const ANY = 'any';
    const MACOS = 'macos';
    const LINUX = 'linux';
    const WINDOWS = 'windows';

    public function values()
    {
        return collect($this->keys())->map(function ($key) {
            return constant("self::$key");
        })->toArray();
    }

    public function toArray()
    {
        return collect($this->keys())->combine($this->values());
    }

    public function keys()
    {
        return [
            'ANY',
            'MACOS',
            'WINDOWS',
            'LINUX',
        ];
    }
}
