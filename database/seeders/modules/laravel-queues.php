<?php

use App\Models\Module;
use App\Models\Resource;

return [
    'name' => ['en' => 'Laravel Queues', 'es' => ''],
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
                'name' => 'The Laravel Podcast - Queues, with Mohamed Said',
                'url' => 'https://laravelpodcast.com/episodes/queues-with-mohamed-said',
                'type' => Resource::AUDIO_TYPE,
            ],
        ]
    ],
    'skill_level' => Module::INTERMEDIATE_SKILL_LEVEL,
];
