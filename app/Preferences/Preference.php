<?php

namespace App\Preferences;

abstract class Preference
{
    abstract public function options();

    abstract public function default();

    public function validate($value)
    {
        return array_key_exists($value, $this->options());
    }
}
