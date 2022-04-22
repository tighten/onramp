<?php

use App\Models\Module;
use App\Models\Resource;

return [
    'name' => ['en' => 'Local PHP Environment', 'es' => ''],
    'description' => [
        'en' => 'Prepare your local development environment before you install and configure your first Laravel application.',
        'es' => '',
    ],
    'skills' => [
        ['es' => '', 'en' => 'Set up a Laravel dev environment'],
        ['es' => '', 'en' => 'Install Composer'],
        ['es' => '', 'en' => 'Use Composer'],
    ],
    // @todo this is not clean.. they shouldn't need ALL these resources, just those for their system. :/ But we don't have a structure for that idea...
    'resources' => [
        'es' => [
            [
                'name' => 'Documentación de Laravel',
                'url' => 'https://docs.laraveles.com/docs/5.5/valet',
                'type' => Resource::ARTICLE_TYPE,
                'os' => 'macos',
            ],
            [
                'name' => 'Artículo de Styde',
                'url' => 'https://styde.net/instalacion-de-composer-y-laravel-en-windows/',
                'type' => Resource::ARTICLE_TYPE,
                'os' => 'windows',
            ],
        ],
        'en' => [
            [
                'name' => 'Laravel Docs (Valet)',
                'url' => 'https://laravel.com/docs/valet',
                'type' => Resource::ARTICLE_TYPE,
                'os' => 'macos',
            ],
            [
                'name' => 'Laracasts Video (Valet)',
                'url' => 'https://laracasts.com/series/setup-a-mac-dev-machine-from-scratch/episodes/10',
                'type' => Resource::VIDEO_TYPE,
                'os' => 'macos',
            ],
            [
                'name' => 'Valet Linux',
                'url' => 'https://cpriego.github.io/valet-linux/',
                'type' => Resource::ARTICLE_TYPE,
                'os' => 'linux',
            ],
            [
                'name' => 'Laragon (for Windows)',
                'url' => 'https://laragon.org/',
                'type' => Resource::ARTICLE_TYPE,
                'os' => 'windows',
            ],
            [
                'name' => 'Vessel Docs (if you prefer Docker)',
                'url' => 'https://vessel.shippingdocker.com/',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Laracasts Video - Composer',
                'url' => 'https://laracasts.com/series/setup-a-mac-dev-machine-from-scratch/episodes/6',
                'type' => Resource::VIDEO_TYPE,
            ],
            [
                'name' => 'The Laravel Podcast - Local Environment with Valet, Homestead, and Docker, with Chris Brown, Jose Soto, Joe Ferguson',
                'url' => 'https://laravelpodcast.com/episodes/local-environment-with-valet-homestead-and-docker-with-chris-brown-jose-soto-joe-ferguson',
                'type' => Resource::AUDIO_TYPE,
            ],
        ],
    ],
    'skill_level' => Module::BEGINNER_SKILL_LEVEL,
];
