<?php

use App\Models\Module;
use App\Models\Resource;

return [
    'name' => ['en' => 'Monitoring (e.g. Bugsnag)', 'es' => ''],
    'description' => [
        'en' => 'Stay on top of your applications performance even during development to learn when the app broke for your users.',
        'es' => '',
    ],
    'skills' => [],
    'resources' => [
        'es' => [],
        'en' => [
            [
                'name' => 'The Laravel Podcast - Debugging and Monitoring, with Jonty Behr',
                'url' => 'https://laravelpodcast.com/episodes/debugging-and-monitoring-with-jonty-behr',
                'type' => Resource::AUDIO_TYPE,
            ],
        ],
    ],
    'skill_level' => Module::ADVANCED_SKILL_LEVEL,
];
