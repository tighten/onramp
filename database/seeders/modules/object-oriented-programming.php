<?php

use App\Models\Resource;

return [
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
                'type' => Resource::VIDEO_TYPE,
            ],
            [
                'name' => 'The Laravel Podcast - Object Oriented Programming, with Alena Holligan',
                'url' => 'https://laravelpodcast.com/episodes/oop-with-alena-holligan',
                'type' => Resource::AUDIO_TYPE,
            ],
        ],
    ],
];
