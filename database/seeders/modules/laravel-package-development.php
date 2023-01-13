<?php

use App\Models\Module;
use App\Models\Resource;

return [
    'name' => ['en' => 'Laravel Package Development', 'es' => ''],
    'description' => [
        'en' => 'Enhance the functionality of your application by creating extensible packages you can share with the community.',
        'es' => '',
    ],
    'skills' => [
        ['es' => '', 'en' => 'Publish configuration files'],
        ['es' => '', 'en' => 'Create a package-specific service provider'],
        ['es' => '', 'en' => 'Test with Testbench'],
    ],
    'resources' => [
        'es' => [],
        'en' => [
            [
                'name' => 'The Laravel Podcast - Packages, with Freek Van der Herten & Marcel Pociot',
                'url' => 'https://laravelpodcast.com/episodes/packages-with-freek-van-der-herten-marcel-pociot',
                'type' => Resource::AUDIO_TYPE,
            ],
        ],
    ],
    'skill_level' => Module::ADVANCED_SKILL_LEVEL,
];
