<?php

use App\Models\Module;
use App\Models\Resource;

return [
    'name' => ['en' => 'Laravel Package Development', 'es' => ''],
    'description' => [
        'en' => '',
        'es' => '',
    ],
    'skills' => [
        ['es' => '', 'en' => ''],
    ],
    'resources' => [
        'es' => [],
        'en' => [
            [
                'name' => 'The Laravel Podcast - Packages, with Freek Van der Herten & Marcel Pociot',
                'url' => 'https://laravelpodcast.com/episodes/packages-with-freek-van-der-herten-marcel-pociot',
                'type' => Resource::AUDIO_TYPE,
            ],
        ]
    ],
    'skill_level' => Module::ADVANCED_SKILL_LEVEL,
];
