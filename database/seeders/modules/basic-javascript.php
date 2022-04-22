<?php

use App\Models\Module;
use App\Models\Resource;

return [
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
                'type' => Resource::ARTICLE_TYPE,
            ],
        ],
        'en' => [
            [
                'name' => 'Wes Bos - JavaScript30',
                'url' => 'https://javascript30.com/',
                'type' => Resource::COURSE_TYPE,
            ],
            [
                'name' => 'TraversyMedia JavaScript Crash Course',
                'url' => 'https://www.youtube.com/watch?v=hdI2bqOjy3c',
                'type' => Resource::VIDEO_TYPE,
            ],
            [
                'name' => 'Codecademy - Learn JavaScript',
                'url' => 'https://www.codecademy.com/learn/learn-javascript',
                'type' => Resource::COURSE_TYPE,
            ],
            [
                'name' => 'Console cheat sheet for JavaScript developers',
                'url' => 'https://levelup.gitconnected.com/console-cheat-sheet-for-javascript-developers-21f0c49604d4',
                'type' => Resource::ARTICLE_TYPE,
            ],
        ],
    ],
    'skill_level' => Module::BEGINNER_SKILL_LEVEL,
];
