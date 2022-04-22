<?php

use App\Models\Module;
use App\Models\Resource;

return [
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
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Manual PHP - Arreglos',
                'url' => 'https://www.php.net/manual/es/language.types.array.php',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Manual PHP - Funciones',
                'url' => 'https://www.php.net/manual/es/language.functions.php',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Manual PHP - Clases',
                'url' => 'https://www.php.net/manual/es/language.oop5.basic.php',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Video de Styde - Clases y Objetos',
                'url' => 'https://styde.net/por-que-necesitamos-clases-y-objetos-php/',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Video de Styde - Constructores',
                'url' => 'https://styde.net/encapsulamiento-y-uso-de-getters-y-setters-en-php/',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Video de Styde - Herencia Básica',
                'url' => 'https://styde.net/herencia-y-abstraccion-con-php/',
                'type' => Resource::ARTICLE_TYPE,
            ],
        ],
        'en' => [
            [
                'name' => 'Laracasts Video (Variables)',
                'url' => 'https://laracasts.com/series/php-for-beginners/episodes/3',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Codecademy - Variables',
                'url' => 'https://www.codecademy.com/learn/learn-php/modules/learn-php-variables',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Laracasts Video (Arrays)',
                'url' => 'https://laracasts.com/series/php-for-beginners/episodes/6',
                'type' => Resource::VIDEO_TYPE,
            ],
            [
                'name' => 'Codecademy - Arrays',
                'url' => 'https://www.codecademy.com/learn/learn-php/modules/learn-php-arrays',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Laracasts Video - Functions',
                'url' => 'https://laracasts.com/series/php-for-beginners/episodes/10',
                'type' => Resource::VIDEO_TYPE,
            ],
            [
                'name' => 'Codecademy - Functions',
                'url' => 'https://www.codecademy.com/learn/learn-php/modules/introduction-to-functions-in-php',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Laracasts Video (Classes)',
                'url' => 'https://laracasts.com/series/php-for-beginners/episodes/12',
                'type' => Resource::VIDEO_TYPE,
            ],
            [
                'name' => 'Codecademy - Conditionals',
                'url' => 'https://www.codecademy.com/learn/learn-php/modules/conditionals-logic-php',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Codecademy - Loops',
                'url' => 'https://www.codecademy.com/learn/learn-php/modules/php-loops',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Open Source Learning for PHP (course)',
                'url' => 'https://www.phpschool.io/',
                'type' => Resource::COURSE_TYPE,
            ],
            [
                'name' => 'The Laravel Podcast - Intro to Composer, with Jordi Boggiano',
                'url' => 'https://laravelpodcast.com/episodes/intro-to-composer-with-jordi-boggiano',
                'type' => Resource::AUDIO_TYPE,
            ],
        ],
    ],
    'skill_level' => Module::BEGINNER_SKILL_LEVEL,
];
