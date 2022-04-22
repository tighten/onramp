<?php

use App\Models\Module;
use App\Models\Resource;

return [
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
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Curso HTML para principiantes de Fazt',
                'url' => 'https://www.youtube.com/watch?v=rbuYtrNUxg4',
                'type' => Resource::VIDEO_TYPE,
            ],
            [
                'name' => 'Curso HTML desde cero de EDteam',
                'url' => 'https://ed.team/cursos/html',
                'type' => Resource::COURSE_TYPE,
            ],
            [
                'name' => 'Referencia CSS',
                'url' => 'https://developer.mozilla.org/es/docs/Web/CSS/Referencia_CSS',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Curso CSS para principiantes de Fazt',
                'url' => 'https://www.youtube.com/watch?v=W6GTDfrWjXs',
                'type' => Resource::VIDEO_TYPE,
            ],
            [
                'name' => 'Curso CSS desde cero de EDteam',
                'url' => 'https://ed.team/cursos/css',
                'type' => Resource::COURSE_TYPE,
            ],
        ],
        'en' => [
            [
                'name' => 'HTML Reference',
                'url' => 'https://htmlreference.io/',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'TraversyMedia HTML Crash Course',
                'url' => 'https://www.youtube.com/watch?v=UB1O30fR-EE',
                'type' => Resource::VIDEO_TYPE,
            ],
            [
                'name' => 'Codecademy Introduction to HTML',
                'url' => 'https://www.codecademy.com/learn/learn-html',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'CSS Reference',
                'url' => 'https://cssreference.io/',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'TraversyMedia CSS Crash Course',
                'url' => 'https://www.youtube.com/watch?v=yfoY53QXEnI',
                'type' => Resource::VIDEO_TYPE,
            ],
            [
                'name' => 'Codecademy Learn CSS',
                'url' => 'https://www.codecademy.com/learn/learn-css',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Flexbox Zombies Master Course',
                'url' => 'https://mastery.games/p/flexbox-zombies',
                'type' => Resource::COURSE_TYPE,
                'bonus' => true,
            ],
            [
                'name' => 'Frontend Masters Web Development Bootcamp',
                'url' => 'https://frontendmasters.com/bootcamp/',
                'type' => Resource::COURSE_TYPE,
            ],
            [
                'name' => 'Wes Bos - CSS Grid',
                'url' => 'https://cssgrid.io/',
                'type' => Resource::COURSE_TYPE,
                'bonus' => true,
            ],
            [
                'name' => 'Wes Bos - What The Flexbox?!',
                'url' => 'http://flexbox.io/',
                'type' => Resource::COURSE_TYPE,
                'bonus' => true,
            ],
        ],
    ],
    'skill_level' => Module::BEGINNER_SKILL_LEVEL,
];
