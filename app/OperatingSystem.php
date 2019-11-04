<?php

namespace App;

class OperatingSystem
{
    const ANY = 'any';
    const MACOS = 'macos';
    const LINUX = 'linux';
    const WINDOWS = 'windows';

    const ALL = [
        self::ANY,
        self::MACOS,
        self::LINUX,
        self::WINDOWS,
    ];
}
