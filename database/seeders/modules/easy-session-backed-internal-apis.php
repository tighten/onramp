<?php

use App\Models\Module;
use App\Models\Resource;

return [
    'name' => ['en' => 'Easy session-backed internal APIs', 'es' => ''],
    'description' => [
        'en' => 'Learn to build simple APIs with Laravel that will power your app\'s JavaScript with almost no code.',
        'es' => '',
    ],
    'skills' => [],
    'resources' => [
        'es' => [],
        'en' => [
            [
                'name' => 'The Laravel Podcast - APIs, with Jess Archer',
                'url' => 'https://laravelpodcast.com/episodes/apis-with-jess-archer',
                'type' => Resource::AUDIO_TYPE,
            ],
        ],
    ],
    'skill_level' => Module::INTERMEDIATE_SKILL_LEVEL,
];
