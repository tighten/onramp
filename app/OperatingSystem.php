<?php

namespace App;

class OperatingSystem
{
    const ANY = 'any';
    const MACOS = 'macos';
    const LINUX = 'linux';
    const WINDOWS = 'windows';

    const ALL = [
        self::ANY => 'Any',
        self::MACOS => 'macOS',
        self::LINUX => 'Linux',
        self::WINDOWS => 'Windows',
    ];
}
