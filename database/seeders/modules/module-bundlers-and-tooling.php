<?php

use App\Models\Module;
use App\Models\Resource;

return [
    'name' => ['en' => 'Module Bundlers and Tooling', 'es' => ''],
    'description' => [
        'en' => 'Ease into module-bundler configuration with a Webpack wrapper that\'s completely optimized for use with Laravel.',
        'es' => '',
    ],
    'skills' => [],
    'resources' => [
        'es' => [],
        'en' => [
            [
                'name' => 'Laracasts Series',
                'url' => 'https://laracasts.com/series/learn-laravel-mix',
                'type' => Resource::COURSE_TYPE,
            ],
            [
                'name' => 'The Laravel Podcast - Mix, with Jordan Pittman',
                'url' => 'https://laravelpodcast.com/episodes/mix-with-jordan-pittman',
                'type' => Resource::AUDIO_TYPE,
            ],
        ],
    ],
    'skill_level' => Module::INTERMEDIATE_SKILL_LEVEL,
];
