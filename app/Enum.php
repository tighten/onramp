<?php

namespace App;

use Illuminate\Contracts\Support\Arrayable;
use ReflectionClass;

abstract class Enum implements Arrayable
{
    public function keys()
    {
        return array_keys($this->toArray());
    }

    public function values()
    {
        return array_values($this->toArray());
    }

    public function validKey($key)
    {
        return array_key_exists($key, $this->toArray());
    }

    public function validValue($value)
    {
        return in_array($key, $this->toArray());
    }

    public function toArray()
    {
        $reflection = new ReflectionClass(get_called_class());
        return $reflection->getConstants();
    }
}
