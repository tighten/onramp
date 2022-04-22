<?php

use App\Models\Module;
use App\Models\Resource;

return [
    'name' => ['en' => 'Laravel Queues', 'es' => ''],
    'description' => [
        'en' => 'Learn how to create performant Laravel apps by using queues to process your time intensive tasks in the background.',
        'es' => '',
    ],
    'skills' => [
        ['es' => '', 'en' => 'Push jobs to queue'],
        ['es' => '', 'en' => 'Enqueue mail'],
        ['es' => '', 'en' => 'Run queue worker'],
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
