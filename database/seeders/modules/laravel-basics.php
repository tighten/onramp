<?php

use App\Models\Resource;

return [
    'name' => ['en' => 'Laravel Basics', 'es' => ''],
    'description' => [
        'en' => 'A great starting point for developers that are new to the Laravel framework and its features.',
        'es' => '',
    ],
    // These aren't quite skills 😬
    'skills' => [
        ['es' => 'Creando y ejecutando un nuevo proyecto de Laravel', 'en' => 'Creating and serving a new Laravel project'],
        ['es' => 'Enrutamiento con Laravel &amp; verbos de HTTP (usando funciones anónimas)', 'en' => 'Routing'],
        ['es' => 'Sintaxis de Blade &amp; Herencia', 'en' => 'Blade Syntax & Inheritance'],
        ['es' => 'Bases de datos relacionadas', 'en' => 'Relational Databases'], // @todo does this belong elsewhere?
        ['es' => 'Migraciones', 'en' => 'Basic migrations'],
        ['es' => 'Sintaxis básica de Eloquent', 'en' => 'Basic Eloquent syntax'],
        ['es' => 'CSRF', 'en' => 'CSRF'],
        ['es' => 'Validación', 'en' => 'Validation'],
        ['es' => 'Envío de correos electrónicos', 'en' => 'Sending Mail'],
        ['es' => 'Service Container', 'en' => 'Service Container'],
    ],
    'resources' => [
        'es' => [
            [
                'name' => 'Documentación de Laravel - Creando un nuevo proyecto',
                'url' => 'https://docs.laraveles.com/docs/5.5/installation',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Video de Styde - Instalacion de Composer y Laravel',
                'url' => 'https://styde.net/instalacion-de-composer-y-laravel/',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Laravel Docs - Enrutamiento',
                'url' => 'https://docs.laraveles.com/docs/5.5/routing',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Video de Styde - Rutas',
                'url' => 'https://styde.net/rutas-con-laravel/',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Laravel Docs - Blade',
                'url' => 'https://docs.laraveles.com/docs/5.5/blade',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Video de Styde - Blade',
                'url' => 'https://styde.net/blade-el-sistema-de-plantillas-de-laravel/',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Video de Styde - Layouts con Blade',
                'url' => 'https://styde.net/layouts-con-blade/',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Khan Academy Article - SQL',
                'url' => 'https://es.khanacademy.org/computing/computer-programming/sql',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Laravel Docs - Migraciones',
                'url' => 'https://docs.laraveles.com/docs/5.5/migrations',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Video de Styde - Migraciones',
                'url' => 'https://styde.net/introduccion-a-las-bases-de-datos-y-migraciones-con-laravel/',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Laravel Docs - Elqouent',
                'url' => 'https://docs.laraveles.com/docs/5.5/eloquent',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Video de Styde - Eloquent',
                'url' => 'https://styde.net/introduccion-a-eloquent-el-orm-del-framework-laravel/',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Laravel Docs - CSRF',
                'url' => 'https://docs.laraveles.com/docs/5.5/csrf',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Video de Styde - Rutas con Post y Protecion Contra Ataques de tipo CSRF',
                'url' => 'https://styde.net/rutas-con-post-y-proteccion-contra-ataques-de-tipo-csrf-en-laravel/',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Laravel Docs - Validación',
                'url' => 'https://docs.laraveles.com/docs/5.5/validation',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Laravel Docs - correos electrónicos',
                'url' => 'https://docs.laraveles.com/docs/5.5/mail',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Laravel Docs - Notificaciones',
                'url' => 'https://docs.laraveles.com/docs/5.5/notifications',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Laravel Docs - Service Container',
                'url' => 'https://docs.laraveles.com/docs/5.5/container',
                'type' => Resource::ARTICLE_TYPE,
            ],
        ],
        'en' => [
            [
                'name' => 'Laravel docs - installation',
                'url' => 'https://laravel.com/docs/installation',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Laracasts Video - installation',
                'url' => 'https://laracasts.com/series/laravel-6-from-scratch/episodes/3',
                'type' => Resource::VIDEO_TYPE,
            ],
            [
                'name' => 'Laravel Docs (Routing)',
                'url' => 'https://laravel.com/docs/routing',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Laracasts Video - Routing',
                'url' => 'https://laracasts.com/series/laravel-6-from-scratch/episodes/5',
                'type' => Resource::VIDEO_TYPE,
            ],
            [
                'name' => 'Laravel Docs (Blade)',
                'url' => 'https://laravel.com/docs/blade',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Laracasts Laravel From Scratch #4 - Blade',
                'url' => 'https://laracasts.com/series/laravel-6-from-scratch/episodes/14',
                'type' => Resource::VIDEO_TYPE,
            ],
            [
                'name' => 'Laracasts Laravel From Scratch #5 - Blade',
                'url' => 'https://laracasts.com/series/laravel-6-from-scratch/episodes/15',
                'type' => Resource::VIDEO_TYPE,
            ],
            [
                'name' => 'Servers for Hackers Video - SQL',
                'url' => 'https://serversforhackers.com/s/up-and-running-with-mysql',
                'type' => Resource::VIDEO_TYPE,
            ],
            [
                'name' => 'Khan Academy Article  - SQL',
                'url' => 'https://www.khanacademy.org/computing/computer-programming/sql',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Laracasts Video - SQL',
                'url' => 'https://laracasts.com/series/php-for-beginners/episodes/11',
                'type' => Resource::VIDEO_TYPE,
            ],
            [
                'name' => 'Laravel Docs (Migrations)',
                'url' => 'https://laravel.com/docs/6.x/migrations',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Laracasts Video - Migrations',
                'url' => 'https://laracasts.com/series/laravel-6-from-scratch/episodes/11',
                'type' => Resource::VIDEO_TYPE,
            ],
            [
                'name' => 'Laravel Docs (Eloquent)',
                'url' => 'https://laravel.com/docs/6.x/eloquent',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Laracasts Video - Eloquent',
                'url' => 'https://laracasts.com/series/laravel-6-from-scratch/episodes/29',
                'type' => Resource::VIDEO_TYPE,
            ],
            [
                'name' => 'Laravel Docs (CSRF)',
                'url' => 'https://laravel.com/docs/6.x/csrf',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Laracasts Video - CSRF',
                'url' => 'https://laracasts.com/series/laravel-6-from-scratch/episodes/37',
                'type' => Resource::VIDEO_TYPE,
            ],
            [
                'name' => 'Laravel Docs (Validation)',
                'url' => 'https://laravel.com/docs/6.x/validation',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Laravel Docs (Mail)',
                'url' => 'https://laravel.com/docs/6.x/mail',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Laravel Docs (Notifications)',
                'url' => 'https://laravel.com/docs/6.x/notifications',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Laravel Docs (Container)',
                'url' => 'https://laravel.com/docs/6.x/container',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'The Laravel Podcast - The Ethos of Laravel, with Taylor Otwell',
                'url' => 'https://laravelpodcast.com/episodes/the-ethos-of-laravel',
                'type' => Resource::AUDIO_TYPE,
            ],
            [
                'name' => 'The Laravel Podcast - Learning & Keeping Up To Date, with Eric Barnes',
                'url' => 'https://laravelpodcast.com/episodes/learning-keeping-up-to-date-with-eric-barnes',
                'type' => Resource::AUDIO_TYPE,
            ],
            [
                'name' => 'The Laravel Podcast - Routing and Blade, with Caleb Porzio',
                'url' => 'https://laravelpodcast.com/episodes/routing-and-blade-with-caleb-porzio',
                'type' => Resource::AUDIO_TYPE,
            ],
            [
                'name' => 'The Laravel Podcast - Eloquent and the Query Builder, with Jonathan Reinink',
                'url' => 'https://laravelpodcast.com/episodes/eloquent-with-jonathan-reinink',
                'type' => Resource::AUDIO_TYPE,
            ],
            [
                'name' => 'The Laravel Podcast - Migrations, Factories, and Seeding, with John Bonaccorsi',
                'url' => 'https://laravelpodcast.com/episodes/migrations-factories-and-seeding-with-john-bonaccorsi',
                'type' => Resource::AUDIO_TYPE,
            ],
            [
                'name' => 'The Laravel Podcast - Authorization and Authentication, with Joseph Silber',
                'url' => 'https://laravelpodcast.com/episodes/authorization-and-authentication-with-joseph-silber',
                'type' => Resource::AUDIO_TYPE,
            ],
            [
                'name' => 'The Laravel Podcast - The Service Container, with Christoph Rumpel',
                'url' => 'https://laravelpodcast.com/episodes/the-service-container-with-christoph-rumpel',
                'type' => Resource::AUDIO_TYPE,
            ],
            [
                'name' => 'The Laravel Podcast - Cache, Session, Middleware, & Request, with Samantha Geitz',
                'url' => 'https://laravelpodcast.com/episodes/cache-session-middleware-request-with-samantha-geitz',
                'type' => Resource::AUDIO_TYPE,
            ],
            [
                'name' => 'The Laravel Podcast - Storage, with Frank de Jonge',
                'url' => 'https://laravelpodcast.com/episodes/storage-with-frank-de-jonge',
                'type' => Resource::AUDIO_TYPE,
            ],
            [
                'name' => 'The Laravel Podcast - Mail and Notifications, with Wilbur Powery',
                'url' => 'https://laravelpodcast.com/episodes/mail-and-notifications-with-wilbur-powery',
                'type' => Resource::AUDIO_TYPE,
            ],
            [
                'name' => 'The Laravel Podcast - Helpers & Collections, with Jacob Baker-Kretzmar',
                'url' => 'https://laravelpodcast.com/episodes/helpers-collections-with-jacob-baker-kretzmar',
                'type' => Resource::AUDIO_TYPE,
            ],
            [
                'name' => 'The Laravel Podcast - Security, with Rizqi Djamaluddin',
                'url' => 'https://laravelpodcast.com/episodes/security-with-rizqi-djamaluddin',
                'type' => Resource::AUDIO_TYPE,
            ],
            [
                'name' => 'The Laravel Podcast - Queues, with Mohamed Said',
                'url' => 'https://laravelpodcast.com/episodes/queues-with-mohamed-said',
                'type' => Resource::AUDIO_TYPE,
            ],
            [
                'name' => 'The Laravel Podcast - Upgrading, with Jason McCreary',
                'url' => 'https://laravelpodcast.com/episodes/upgrading-with-jason-mccreary',
                'type' => Resource::AUDIO_TYPE,
            ],
        ],
    ],
];
