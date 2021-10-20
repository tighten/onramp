<?php

use App\Models\Resource;

return [
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
                'type' => Resource::ARTICLE_TYPE,
            ],
        ],
    ],
];
