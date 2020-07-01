<?php

// Each entry is a module, which can have resources and skills
return [
    [
        'name' => ['en' => 'Build a basic web site', 'es' => ''],
        'description' => [
            'en' => 'Building a website can unlock a whole set of opportunities.',
            'es' => '',
        ],
        'skills' => [
            ['es' => '', 'en' => 'Write HTML'],
            ['es' => '', 'en' => 'Write CSS'],
        ],
        'resources' => [
            'es' => [
                [
                    'name' => 'Refencia de Elementos HTML',
                    'url' => 'https://developer.mozilla.org/es/docs/Web/HTML/Elemento/',
                    'type' => 'article',
                ],
                [
                    'name' => 'Curso HTML para principiantes de Fazt',
                    'url' => 'https://www.youtube.com/watch?v=rbuYtrNUxg4',
                    'type' => 'video',
                ],
                [
                    'name' => 'Curso HTML desde cero de EDteam',
                    'url' => 'https://ed.team/cursos/html',
                    'type' => 'course',
                ],
                [
                    'name' => 'Referencia CSS',
                    'url' => 'https://developer.mozilla.org/es/docs/Web/CSS/Referencia_CSS',
                    'type' => 'article',
                ],
                [
                    'name' => 'Curso CSS para principiantes de Fazt',
                    'url' => 'https://www.youtube.com/watch?v=W6GTDfrWjXs',
                    'type' => 'video',
                ],
                [
                    'name' => 'Curso CSS desde cero de EDteam',
                    'url' => 'https://ed.team/cursos/css',
                    'type' => 'course',
                ],
            ],
            'en' => [
                [
                    'name' => 'HTML Reference',
                    'url' => 'https://htmlreference.io/',
                    'type' => 'article',
                ],
                [
                    'name' => 'TraversyMedia HTML Crash Course',
                    'url' => 'https://www.youtube.com/watch?v=UB1O30fR-EE',
                    'type' => 'video',
                ],
                [
                    'name' => 'Codecademy Introduction to HTML',
                    'url' => 'https://www.codecademy.com/learn/learn-html',
                    'type' => 'article',
                ],
                [
                    'name' => 'CSS Reference',
                    'url' => 'https://cssreference.io/',
                    'type' => 'article',
                ],
                [
                    'name' => 'TraversyMedia CSS Crash Course',
                    'url' => 'https://www.youtube.com/watch?v=yfoY53QXEnI',
                    'type' => 'video',
                ],
                [
                    'name' => 'Codecademy Learn CSS',
                    'url' => 'https://www.codecademy.com/learn/learn-css',
                    'type' => 'article',
                ],
                [
                    'name' => 'Flexbox Zombies Master Course',
                    'url' => 'https://mastery.games/p/flexbox-zombies',
                    'type' => 'course',
                    'bonus' => true,
                ],
                [
                    'name' => 'Frontend Masters Web Development Bootcamp',
                    'url' => 'https://frontendmasters.com/bootcamp/',
                    'type' => 'course',
                ],
                [
                    'name' => 'Wes Bos - CSS Grid',
                    'url' => 'https://cssgrid.io/',
                    'type' => 'course',
                    'bonus' => true,
                ],
                [
                    'name' => 'Wes Bos - What The Flexbox?!',
                    'url' => 'http://flexbox.io/',
                    'type' => 'course',
                    'bonus' => true,
                ],
            ],
        ],
    ],
    [
        'name' => ['en' => 'Basic Terminal & Git', 'es' => ''],
        'description' => [
            'en' => 'Master navigating the command line and code versioning concepts to increase your productivity as a developer.',
            'es' => '',
        ],
        'skills' => [
            ['es' => '', 'en' => 'Navigate the terminal'],
            ['es' => '', 'en' => 'Use Git for basic tasks'],
        ],
        'resources' => [
            'es' => [
                [
                    'name' => 'Video de códigofacilito',
                    'url' => 'https://www.youtube.com/watch?v=FP_4uQXysRU',
                    'type' => 'video',
                ],
                [
                    'name' => 'Git - La guía simple',
                    'url' => 'https://rogerdudler.github.io/git-guide/index.es.html',
                    'type' => 'article',
                ],
                [
                    'name' => 'Curso Git de códigofacilito',
                    'url' => 'https://www.youtube.com/watch?v=zH3I1DZNovk&list=PL9xYXqvLX2kMUrXTvDY6GI2hgacfy0rId',
                    'type' => 'article',
                ],
            ],
            'en' => [
                [
                    'name' => 'Treehouse Article',
                    'url' => 'https://blog.teamtreehouse.com/introduction-to-the-mac-os-x-command-line',
                    'type' => 'article',
                ],
                [
                    'name' => 'Codecademy Course',
                    'url' => 'https://www.codecademy.com/courses/learn-the-command-line/lessons/navigation/exercises/your-first-command?action=resume_content_item',
                    'type' => 'article',
                ],
                [
                    'name' => 'Git Tower eBook',
                    'url' => 'https://www.git-tower.com/learn/',
                    'type' => 'book',
                ],
                [
                    'name' => 'Git Tower Video Course',
                    'url' => 'https://www.git-tower.com/learn/',
                    'type' => 'video',
                ],
                [
                    'name' => 'Git - The simple guide',
                    'url' => 'https://rogerdudler.github.io/git-guide/',
                    'type' => 'article',
                ],
                [
                    'name' => 'Branch from Master, and Make Your First Commit Article',
                    'url' => 'https://dev.to/taeluralexis/break-git-down-how-to-create-a-branch-from-master-and-make-your-first-commit-2960',
                    'type' => 'article',
                ],
                [
                    'name' => 'Wes Bos - Command Line Power User',
                    'url' => 'https://commandlinepoweruser.com/',
                    'type' => 'course',
                ],
            ],
        ],
    ],
    [
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
                    'type' => 'article',
                    'os' => 'macos',
                ],
                [
                    'name' => 'Artículo de Styde',
                    'url' => 'https://styde.net/instalacion-de-composer-y-laravel-en-windows/',
                    'type' => 'article',
                    'os' => 'windows',
                ],
            ],
            'en' => [
                [
                    'name' => 'Laravel Docs (Valet)',
                    'url' => 'https://laravel.com/docs/valet',
                    'type' => 'article',
                    'os' => 'macos',
                ],
                [
                    'name' => 'Laracasts Video (Valet)',
                    'url' => 'https://laracasts.com/series/setup-a-mac-dev-machine-from-scratch/episodes/10',
                    'type' => 'video',
                    'os' => 'macos',
                ],
                [
                    'name' => 'Valet Linux',
                    'url' => 'https://cpriego.github.io/valet-linux/',
                    'type' => 'article',
                    'os' => 'linux',
                ],
                [
                    'name' => 'Laragon (for Windows)',
                    'url' => 'https://laragon.org/',
                    'type' => 'article',
                    'os' => 'windows',
                ],
                [
                    'name' => 'Vessel Docs (if you prefer Docker)',
                    'url' => 'https://vessel.shippingdocker.com/',
                    'type' => 'article',
                ],
                [
                    'name' => 'Laracasts Video - Composer',
                    'url' => 'https://laracasts.com/series/setup-a-mac-dev-machine-from-scratch/episodes/6',
                    'type' => 'video',
                ],
            ],
        ],
    ],
    [
        'name' => ['en' => 'Beginning PHP', 'es' => ''],
        'description' => [
            'en' => 'Start building dynamic, interactive web applications by learning one of the most widely used languages on the web.',
            'es' => '',
        ],
        'skills' => [
            ['es' => 'Variables', 'en' => 'Work with variables'],
            ['es' => 'Arreglos', 'en' => 'Work with arrays'],
            ['es' => 'Funciones', 'en' => 'Define and use functions'],
            ['es' => 'Clases', 'en' => 'Create and instantiate classes'],
            ['es' => '', 'en' => 'Write conditionals'],
            ['es' => '', 'en' => 'Write loops'],
            ['es' => 'Constructores', 'en' => 'Use class constructors'],
            ['es' => 'Herencia Básica', 'en' => 'Use simple class inheritance'],
            ['es' => '', 'en' => 'Use simple OOP composition'],
        ],
        'resources' => [
            'es' => [
                [
                    'name' => 'Manual PHP - Variables',
                    'url' => 'https://www.php.net/manual/es/language.variables.php',
                    'type' => 'article',
                ],
                [
                    'name' => 'Manual PHP - Arreglos',
                    'url' => 'https://www.php.net/manual/es/language.types.array.php',
                    'type' => 'article',
                ],
                [
                    'name' => 'Manual PHP - Funciones',
                    'url' => 'https://www.php.net/manual/es/language.functions.php',
                    'type' => 'article',
                ],
                [
                    'name' => 'Manual PHP - Clases',
                    'url' => 'https://www.php.net/manual/es/language.oop5.basic.php',
                    'type' => 'article',
                ],
                [
                    'name' => 'Video de Styde - Clases y Objetos',
                    'url' => 'https://styde.net/por-que-necesitamos-clases-y-objetos-php/',
                    'type' => 'article',
                ],
                [
                    'name' => 'Video de Styde - Constructores',
                    'url' => 'https://styde.net/encapsulamiento-y-uso-de-getters-y-setters-en-php/',
                    'type' => 'article',
                ],
                [
                    'name' => 'Video de Styde - Herencia Básica',
                    'url' => 'https://styde.net/herencia-y-abstraccion-con-php/',
                    'type' => 'article',
                ],
            ],
            'en' => [
                [
                    'name' => 'Laracasts Video (Variables)',
                    'url' => 'https://laracasts.com/series/php-for-beginners/episodes/3',
                    'type' => 'article',
                ],
                [
                    'name' => 'Codecademy - Variables',
                    'url' => 'https://www.codecademy.com/learn/learn-php/modules/learn-php-variables',
                    'type' => 'article',
                ],
                [
                    'name' => 'Laracasts Video (Arrays)',
                    'url' => 'https://laracasts.com/series/php-for-beginners/episodes/6',
                    'type' => 'video',
                ],
                [
                    'name' => 'Codecademy - Arrays',
                    'url' => 'https://www.codecademy.com/learn/learn-php/modules/learn-php-arrays',
                    'type' => 'article',
                ],
                [
                    'name' => 'Laracasts Video - Functions',
                    'url' => 'https://laracasts.com/series/php-for-beginners/episodes/10',
                    'type' => 'video',
                ],
                [
                    'name' => 'Codecademy - Functions',
                    'url' => 'https://www.codecademy.com/learn/learn-php/modules/introduction-to-functions-in-php',
                    'type' => 'article',
                ],
                [
                    'name' => 'Laracasts Video (Classes)',
                    'url' => 'https://laracasts.com/series/php-for-beginners/episodes/12',
                    'type' => 'video',
                ],
                [
                    'name' => 'Codecademy - Conditionals',
                    'url' => 'https://www.codecademy.com/learn/learn-php/modules/conditionals-logic-php',
                    'type' => 'article',
                ],
                [
                    'name' => 'Codecademy - Loops',
                    'url' => 'https://www.codecademy.com/learn/learn-php/modules/php-loops',
                    'type' => 'article',
                ],
                [
                    'name' => 'Open Source Learning for PHP (course)',
                    'url' => 'https://www.phpschool.io/',
                    'type' => 'course',
                ],
            ],
        ],
    ],
    [
        'name' => ['en' => 'Object-Oriented Programming', 'es' => ''],
        'description' => [
            'en' => 'Gain foundational knowledge of writing a clean, modular computer program by learning key concepts including Inheritance, Polymorphism, Abstraction and Encapsulation.',
            'es' => '',
        ],
        'skills' => [],
        'resources' => [
            'es' => [],
            'en' => [
                [
                    'name' => 'Laracasts Video',
                    'url' => 'https://laracasts.com/series/object-oriented-principles-in-php',
                    'type' => 'video',
                ],
            ],
        ],
    ],
    [
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
                    'type' => 'article',
                ],
                [
                    'name' => 'Video de Styde - Instalacion de Composer y Laravel',
                    'url' => 'https://styde.net/instalacion-de-composer-y-laravel/',
                    'type' => 'article',
                ],
                [
                    'name' => 'Laravel Docs - Enrutamiento',
                    'url' => 'https://docs.laraveles.com/docs/5.5/routing',
                    'type' => 'article',
                ],
                [
                    'name' => 'Video de Styde - Rutas',
                    'url' => 'https://styde.net/rutas-con-laravel/',
                    'type' => 'article',
                ],
                [
                    'name' => 'Laravel Docs - Blade',
                    'url' => 'https://docs.laraveles.com/docs/5.5/blade',
                    'type' => 'article',
                ],
                [
                    'name' => 'Video de Styde - Blade',
                    'url' => 'https://styde.net/blade-el-sistema-de-plantillas-de-laravel/',
                    'type' => 'article',
                ],
                [
                    'name' => 'Video de Styde - Layouts con Blade',
                    'url' => 'https://styde.net/layouts-con-blade/',
                    'type' => 'article',
                ],
                [
                    'name' => 'Khan Academy Article - SQL',
                    'url' => 'https://es.khanacademy.org/computing/computer-programming/sql',
                    'type' => 'article',
                ],
                [
                    'name' => 'Laravel Docs - Migraciones',
                    'url' => 'https://docs.laraveles.com/docs/5.5/migrations',
                    'type' => 'article',
                ],
                [
                    'name' => 'Video de Styde - Migraciones',
                    'url' => 'https://styde.net/introduccion-a-las-bases-de-datos-y-migraciones-con-laravel/',
                    'type' => 'article',
                ],
                [
                    'name' => 'Laravel Docs - Elqouent',
                    'url' => 'https://docs.laraveles.com/docs/5.5/eloquent',
                    'type' => 'article',
                ],
                [
                    'name' => 'Video de Styde - Eloquent',
                    'url' => 'https://styde.net/introduccion-a-eloquent-el-orm-del-framework-laravel/',
                    'type' => 'article',
                ],
                [
                    'name' => 'Laravel Docs - CSRF',
                    'url' => 'https://docs.laraveles.com/docs/5.5/csrf',
                    'type' => 'article',
                ],
                [
                    'name' => 'Video de Styde - Rutas con Post y Protecion Contra Ataques de tipo CSRF',
                    'url' => 'https://styde.net/rutas-con-post-y-proteccion-contra-ataques-de-tipo-csrf-en-laravel/',
                    'type' => 'article',
                ],
                [
                    'name' => 'Laravel Docs - Validación',
                    'url' => 'https://docs.laraveles.com/docs/5.5/validation',
                    'type' => 'article',
                ],
                [
                    'name' => 'Laravel Docs - correos electrónicos',
                    'url' => 'https://docs.laraveles.com/docs/5.5/mail',
                    'type' => 'article',
                ],
                [
                    'name' => 'Laravel Docs - Notificaciones',
                    'url' => 'https://docs.laraveles.com/docs/5.5/notifications',
                    'type' => 'article',
                ],
                [
                    'name' => 'Laravel Docs - Service Container',
                    'url' => 'https://docs.laraveles.com/docs/5.5/container',
                    'type' => 'article',
                ],
            ],
            'en' => [
                [
                    'name' => 'Laravel docs - installation',
                    'url' => 'https://laravel.com/docs/installation',
                    'type' => 'article',
                ],
                [
                    'name' => 'Laracasts Video - installation',
                    'url' => 'https://laracasts.com/series/laravel-6-from-scratch/episodes/3',
                    'type' => 'video',
                ],
                [
                    'name' => 'Laravel Docs (Routing)',
                    'url' => 'https://laravel.com/docs/routing',
                    'type' => 'article',
                ],
                [
                    'name' => 'Laracasts Video - Routing',
                    'url' => 'https://laracasts.com/series/laravel-6-from-scratch/episodes/5',
                    'type' => 'video',
                ],
                [
                    'name' => 'Laravel Docs (Blade)',
                    'url' => 'https://laravel.com/docs/blade',
                    'type' => 'article',
                ],
                [
                    'name' => 'Laracasts Laravel From Scratch #4 - Blade',
                    'url' => 'https://laracasts.com/series/laravel-6-from-scratch/episodes/14',
                    'type' => 'video',
                ],
                [
                    'name' => 'Laracasts Laravel From Scratch #5 - Blade',
                    'url' => 'https://laracasts.com/series/laravel-6-from-scratch/episodes/15',
                    'type' => 'video',
                ],
                [
                    'name' => 'Servers for Hackers Video - SQL',
                    'url' => 'https://serversforhackers.com/s/up-and-running-with-mysql',
                    'type' => 'video',
                    ],
                [
                    'name' => 'Khan Academy Article  - SQL',
                    'url' => 'https://www.khanacademy.org/computing/computer-programming/sql',
                    'type' => 'article',
                ],
                [
                    'name' => 'Laracasts Video - SQL',
                    'url' => 'https://laracasts.com/series/php-for-beginners/episodes/11',
                    'type' => 'video',
                ],
                [
                    'name' => 'Laravel Docs (Migrations)',
                    'url' => 'https://laravel.com/docs/6.x/migrations',
                    'type' => 'article',
                ],
                [
                    'name' => 'Laracasts Video - Migrations',
                    'url' => 'https://laracasts.com/series/laravel-6-from-scratch/episodes/11',
                    'type' => 'video',
                ],
                [
                    'name' => 'Laravel Docs (Eloquent)',
                    'url' => 'https://laravel.com/docs/6.x/eloquent',
                    'type' => 'article',
                ],
                [
                    'name' => 'Laracasts Video - Eloquent',
                    'url' => 'https://laracasts.com/series/laravel-6-from-scratch/episodes/29',
                    'type' => 'video',
                ],
                [
                    'name' => 'Laravel Docs (CSRF)',
                    'url' => 'https://laravel.com/docs/6.x/csrf',
                    'type' => 'article',
                ],
                [
                    'name' => 'Laracasts Video - CSRF',
                    'url' => 'https://laracasts.com/series/laravel-6-from-scratch/episodes/37',
                    'type' => 'video',
                ],
                [
                    'name' => 'Laravel Docs (Validation)',
                    'url' => 'https://laravel.com/docs/6.x/validation',
                    'type' => 'article',
                ],
                [
                    'name' => 'Laravel Docs (Mail)',
                    'url' => 'https://laravel.com/docs/6.x/mail',
                    'type' => 'article',
                ],
                [
                    'name' => 'Laravel Docs (Notifications)',
                    'url' => 'https://laravel.com/docs/6.x/notifications',
                    'type' => 'article',
                ],
                [
                    'name' => 'Laravel Docs (Container)',
                    'url' => 'https://laravel.com/docs/6.x/container',
                    'type' => 'article',
                ],
            ],
        ],
    ],
    [
        'name' => ['en' => 'Basic JavaScript', 'es' => ''],
        'description' => [
            'en' => 'Use this to turn your basic website into a dynamic web experience and start thinking like a programmer.',
            'es' => '',
        ],
        'skills' => [],
        'resources' => [
            'es' => [
                [
                    'name' => 'Javascript desde cero de EDteam',
                    'url' => 'https://ed.team/cursos/javascript',
                    'type' => 'article',
                ],
            ],
            'en' => [
                [
                    'name' => 'Wes Bos - JavaScript30',
                    'url' => 'https://javascript30.com/',
                    'type' => 'course',
                ],
                [
                    'name' => 'TraversyMedia JavaScript Crash Course',
                    'url' => 'https://www.youtube.com/watch?v=hdI2bqOjy3c',
                    'type' => 'video',
                ],
                [
                    'name' => 'Codecademy - Learn JavaScript',
                    'url' => 'https://www.codecademy.com/learn/learn-javascript',
                    'type' => 'course',
                ],
                [
                    'name' => 'Console cheat sheet for JavaScript developers',
                    'url' => 'https://levelup.gitconnected.com/console-cheat-sheet-for-javascript-developers-21f0c49604d4',
                    'type' => 'article',
                ],
            ],
        ],
    ],
    [
        'name' => ['en' => 'Laravel Mix', 'es' => ''],
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
                    'type' => 'course',
                ],
            ],
        ],
    ],
    [
        'name' => ['en' => 'Easy session-backed internal APIs', 'es' => ''],
        'description' => [
            'en' => 'Learn to build simple APIs with Laravel that will power your app\'s JavaScript with almost no code.',
            'es' => '',
        ],
        'skills' => [],
        'resources' => [
            'es' => [],
            'en' => [],
        ],
    ],
    [
        'name' => ['en' => 'Deployments', 'es' => ''],
        'description' => [
            'en' => 'Learn how to use powerful tools like Laravel Forge to spin up your own servers and automatically deploy your code to it from GitHub.',
            'es' => '',
        ],
        'skills' => [],
        'resources' => [
            'es' => [],
            'en' => [],
        ],
    ],
    [
        'name' => ['en' => 'Monitoring (e.g. Bugsnag)', 'es' => ''],
        'description' => [
            'en' => 'Stay on top of your applications performance even during development to learn when the app broke for your users.',
            'es' => '',
        ],
        'skills' => [],
        'resources' => [
            'es' => [],
            'en' => [],
        ],
    ],
    [
        'name' => ['en' => 'Basic Testing', 'es' => ''],
        'description' => [
            'en' => 'Write code that asserts its own behavior to help you start and stay confident it does what it should.',
            'es' => '',
        ],
        'skills' => [],
        'resources' => [
            'es' => [],
            'en' => [
                [
                    'name' => 'Start Testing Laravel',
                    'url' => 'https://jasonmccreary.me/articles/start-testing-laravel/',
                    'type' => 'article',
                ],
            ],
        ],
    ],
    [
        'name' => ['en' => 'Basic Dev-Ops', 'es' => ''],
        'bonus' => true,
        'description' => [
            'en' => 'Manage your servers and the rest of your deployment infrastructure yourself.',
            'es' => '',
        ],
        'skills' => [],
        'resources' => [
            'es' => [],
            'en' => [
                [
                    'name' => 'Getting Your First Site Up and Running With Laravel Forge',
                    'url' => 'https://mattstauffer.com/blog/getting-your-first-site-up-and-running-in-laravel-forge/',
                    'type' => 'article',
                ],
            ],
        ],
    ],
    [
        'name' => ['en' => 'Laravel Vs WordPress', 'es' => ''],
        'description' => [
            'en' => 'Learn the differences between Laravel and WordPress and why you might choose to use Laravel for a project.',
            'es' => '',
        ],
        'skills' => [],
        'resources' => [
            'es' => [],
            'en' => [],
        ],
    ],
    [
        'name' => ['en' => 'Mapping the WordPress Concepts', 'es' => ''],
        'description' => [
            'en' => 'Taking concepts you\'re already familiar with like themes and hooks, and seeing how they might be accomplished using Laravel.',
            'es' => '',
        ],
        'skills' => [],
        'resources' => [
            'es' => [],
            'en' => [],
        ],
    ],
    [
        'name' => ['en' => 'Local PHP Environment for WordPress Developers', 'es' => ''],
        'description' => [
            'en' => 'Configuring your local environment for development outside of WordPress.',
            'es' => '',
        ],
        'skills' => [],
        'resources' => [
            'es' => [],
            'en' => [],
        ],
    ],
    [
        'name' => ['en' => 'Laravel Basics for WordPress Developers', 'es' => ''],
        'description' => [
            'en' => 'A great starting point for developers that are new to the Laravel framework and its features.',
            'es' => '',
        ],
        'skills' => [],
        'resources' => [
            'es' => [],
            'en' => [],
        ],
    ],
];
