<?php

return [
    [
        'name' => 'HTML',
        'links' => [
            'HTML Reference' => 'https://htmlreference.io/',
            'TraversyMedia HTML Crash Course' => 'https://www.youtube.com/watch?v=UB1O30fR-EE',
            'Codecademy Introduction to HTML' => 'https://www.codecademy.com/learn/learn-html',
        ],
    ],
    [
        'name' => 'CSS',
        'links' => [
            'CSS Reference' => 'https://cssreference.io/',
            'TraversyMedia CSS Crash Course' => 'https://www.youtube.com/watch?v=yfoY53QXEnI',
            'Codecademy Learn CSS' => 'https://www.codecademy.com/learn/learn-css',
        ],
    ],
    [
        'name' => 'Basic Terminal Commands',
        'links' => [
            'Treehouse Article' => 'https://blog.teamtreehouse.com/introduction-to-the-mac-os-x-command-line',
            'Codecademy Course' => 'https://www.codecademy.com/courses/learn-the-command-line/lessons/navigation/exercises/your-first-command?action=resume_content_item',
        ],
    ],
    [
        'name' => 'Git',
        'links' => [
            'Git Intro' => 'https://dev.to/taeluralexis/break-git-down-how-to-create-a-branch-from-master-and-make-your-first-commit-2960',
            'Git Tower eBook &amp; Video' => 'https://www.git-tower.com/learn/',
            'Git - The simple guide' => 'https://rogerdudler.github.io/git-guide/'
        ],
    ],
    [
        'name' => 'Local PHP Environment',
        'children' => [
            [
                'name' => 'Valet (if using a Mac)',
                'links' => [
                    'Laravel Docs (Valet)' => 'https://laravel.com/docs/valet',
                    'Laracasts Video' => 'https://laracasts.com/series/setup-a-mac-dev-machine-from-scratch/episodes/10',
                ],
            ],
            [
                'name' => 'Valet Linux (if using Linux)',
                'links' => [
                    'Valet Linux' => 'https://cpriego.github.io/valet-linux/',
                ],
            ],
            [
                'name' => 'Laragon (standalone installable for Windows)',
                'links' => [
                    'Laragon' => 'https://laragon.org/',
                ],
            ],
            [
                'name' => 'Homestead (if you prefer Vagrant)',
                'links' => [
                    'Laravel Docs' => 'https://laravel.com/docs/homestead',
                ],
            ],
            [
                'name' => 'Vessel (if you prefer Docker)',
                'links' => [
                    'Vessel Docs' => 'https://vessel.shippingdocker.com/',
                ],
            ],
            [
                'name' => 'Composer',
                'links' => [
                    'Laracasts Video' => 'https://laracasts.com/series/setup-a-mac-dev-machine-from-scratch/episodes/6',
                    'Step by Step tutorial (Ubuntu)' => 'https://www.digitalocean.com/community/tutorials/how-to-install-and-use-composer-on-ubuntu-18-04'
                ],
            ],
        ],
    ],
    [
        'name' => 'Beginning PHP',
        'children' => [
            [
                'name' => 'Variables',
                'links' => [
                    'Laracasts Video' => 'https://laracasts.com/series/php-for-beginners/episodes/3',
                    'Codecademy' => 'https://www.codecademy.com/learn/learn-php/modules/learn-php-variables',
                ],
            ],
            [
                'name' => 'Arrays',
                'links' => [
                    'Laracasts Video' => 'https://laracasts.com/series/php-for-beginners/episodes/6',
                    'Codecademy' => 'https://www.codecademy.com/learn/learn-php/modules/learn-php-arrays'
                ],
            ],
            [
                'name' => 'Functions',
                'links' => [
                    'Laracasts Video' => 'https://laracasts.com/series/php-for-beginners/episodes/10',
                    'Codecademy' => 'https://www.codecademy.com/learn/learn-php/modules/introduction-to-functions-in-php'
                ],
            ],
            [
                'name' => 'Classes',
                'links' => [
                    'Laracasts Video' => 'https://laracasts.com/series/php-for-beginners/episodes/12',
                ],
            ],
            [
                'name' => 'Conditionals',
                'links' => [
                    'Codecademy' => 'https://www.codecademy.com/learn/learn-php/modules/conditionals-logic-php',
                ],
            ],
            [
                'name' => 'Loops',
                'links' => [
                    'Codecademy' => 'https://www.codecademy.com/learn/learn-php/modules/php-loops',
                ],
            ],
            [
                'name' => 'Constructors',
            ],
            [
                'name' => 'Basic Inheritance',
            ],
        ],
    ],
    [
        'name' => 'Object-Oriented Programming',
        'links' => [
            'Laracasts Video' => 'https://laracasts.com/series/object-oriented-bootcamp-in-php',
        ],
    ],
    [
        'name' => 'Creating and serving a new Laravel project',
        'links' => [
            'Laravel docs' => 'https://laravel.com/docs/installation',
            'Laracasts Video' => 'https://laracasts.com/series/laravel-from-scratch-2018/episodes/2',
        ],
    ],
    [
        'name' => 'Laravel Basics',
        'links' => [
            'Laracasts Series' => 'https://laracasts.com/series/laravel-from-scratch-2018',
        ],
        'children' => [
            [
                'name' => 'Laravel Routing &amp; HTTP Verbs (using route closures)',
                'links' => [
                    'Laravel Docs (Routing)' => 'https://laravel.com/docs/routing',
                    'Laracasts Video' => 'https://laracasts.com/series/laravel-from-scratch-2018/episodes/3',
                ],
            ],
            [
                'name' => 'Blade Syntax &amp; Inheritance',
                'links' => [
                    'Laravel Docs (Blade)' => 'https://laravel.com/docs/blade',
                    'Laracasts Laravel From Scratch #4' => 'https://laracasts.com/series/laravel-from-scratch-2018/episodes/4',
                    'Laracasts Laravel From Scratch #5' => 'https://laracasts.com/series/laravel-from-scratch-2018/episodes/5',
                ],
            ],
            [
                'name' => 'Relational Databases',
                'links' => [
                    'Servers for Hackers Video' => 'https://serversforhackers.com/s/up-and-running-with-mysql',
                    'Khan Academy Article' => 'https://www.khanacademy.org/computing/computer-programming/sql',
                    'W3 Schools Exercise' => 'https://www.w3schools.com/sql/exercise.asp?filename=exercise_select1',
                    'Laracasts Video' => 'https://laracasts.com/series/php-for-beginners/episodes/11',
                ],
            ],
            [
                'name' => 'Basic migrations',
                'links' => [
                    'Laravel Docs (Migrations)' => 'https://laravel.com/docs/5.8/migrations',
                    'Laracasts Video' => 'https://laracasts.com/series/laravel-from-scratch-2018/episodes/7',
                ],
            ],
            [
                'name' => 'Basic Eloquent syntax',
                'links' => [
                    'Laravel Docs (Eloquent)' => 'https://laravel.com/docs/5.8/eloquent',
                    'Laracasts Video' => 'https://laracasts.com/series/laravel-from-scratch-2018/episodes/8',
                ],
            ],
            [
                'name' => 'CSRF',
                'links' => [
                    'Laravel Docs (CSRF)' => 'https://laravel.com/docs/5.8/csrf',
                    'Laracasts Video' => 'https://laracasts.com/series/laravel-from-scratch-2018/episodes/10',
                ],
            ],
            [
                'name' => 'Validation',
                'links' => [
                    'Laravel Docs (Validation)' => 'https://laravel.com/docs/5.8/validation',
                ],
            ],
            [
                'name' => 'Sending mail',
                'links' => [
                    'Laravel Docs (Mail)' => 'https://laravel.com/docs/5.8/mail',
                    'Laravel Docs (Notifications)' => 'https://laravel.com/docs/5.8/notifications',
                ],
            ],
            [
                'name' => 'Service Container',
                'links' => [
                    'Laravel Docs (Container)' => 'https://laravel.com/docs/5.8/container',
                ],
            ],
        ],
    ],
    [
        'name' => 'Basic JavaScript',
        'links' => [
            'Wes Bos Video Series' => 'https://javascript30.com/',
            'TraversyMedia JavaScript Crash Course' => 'https://www.youtube.com/watch?v=hdI2bqOjy3c',
            'Codecademy' => 'https://www.codecademy.com/learn/learn-javascript',
        ],
    ],
    [
        'name' => 'Laravel Mix',
        'links' => [
            'Laracasts Series' => 'https://laracasts.com/series/learn-laravel-mix',
        ],
    ],
    [
        'name' => 'Basic session-backed internal APIs',
    ],
    [
        'name' => 'Deployments',
    ],
    [
        'name' => 'Monitoring (e.g. Bugsnag)',
    ],
    [
        'name' => 'Basic Testing',
        'links' => [
            'Start Testing Laravel' => 'https://jasonmccreary.me/articles/start-testing-laravel/',
        ],
    ]
];
