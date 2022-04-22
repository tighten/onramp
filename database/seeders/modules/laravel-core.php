<?php

use App\Models\Module;
use App\Models\Resource;

return [
    'name' => ['en' => 'Laravel Core', 'es' => ''],
    'description' => [
        'en' => 'Take your mastery of Laravel to the next level by diving into the internal features at the framework\'s core.',
        'es' => '',
    ],
    'skills' => [],
    'resources' => [
        'es' => [],
        'en' => [
            [
                'name' => 'The Laravel Podcast - The Service Container, with Christoph Rumpel',
                'url' => 'https://laravelpodcast.com/episodes/the-service-container-with-christoph-rumpel',
                'type' => Resource::AUDIO_TYPE,
            ],
        ]
    ],
    'skill_level' => Module::INTERMEDIATE_SKILL_LEVEL,
];
