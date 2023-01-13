<?php

use App\Models\Module;
use App\Models\Resource;

return [
    'name' => ['en' => 'Auth', 'es' => ''],
    'description' => [
        'en' => 'Learn how to verify your application\'s users and other preventative measures you can take to protect your app against security vulnerabilities.',
        'es' => '',
    ],
    'skills' => [
        ['es' => '', 'en' => 'Authorize user actions'],
        ['es' => '', 'en' => 'Authenticate users'],
        ['es' => '', 'en' => 'Manage user roles and permissions'],
    ],
    'resources' => [
        'es' => [],
        'en' => [
            [
                'name' => 'The Laravel Podcast - Presets & Jetstream, with Michael Dyrynda',
                'url' => 'https://laravelpodcast.com/episodes/presets-jetstream-with-michael-dyrynda',
                'type' => Resource::AUDIO_TYPE,
            ],
        ],
    ],
    'skill_level' => Module::INTERMEDIATE_SKILL_LEVEL,
];
