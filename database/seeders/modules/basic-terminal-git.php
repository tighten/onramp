<?php

use App\Models\Resource;

return [
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
                'type' => Resource::VIDEO_TYPE,
            ],
            [
                'name' => 'Git - La guía simple',
                'url' => 'https://rogerdudler.github.io/git-guide/index.es.html',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Curso Git de códigofacilito',
                'url' => 'https://www.youtube.com/watch?v=zH3I1DZNovk&list=PL9xYXqvLX2kMUrXTvDY6GI2hgacfy0rId',
                'type' => Resource::ARTICLE_TYPE,
            ],
        ],
        'en' => [
            [
                'name' => 'Treehouse Article',
                'url' => 'https://blog.teamtreehouse.com/introduction-to-the-mac-os-x-command-line',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Codecademy Course',
                'url' => 'https://www.codecademy.com/courses/learn-the-command-line/lessons/navigation/exercises/your-first-command?action=resume_content_item',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Git Tower eBook',
                'url' => 'https://www.git-tower.com/learn/',
                'type' => Resource::BOOK_TYPE,
            ],
            [
                'name' => 'Git Tower Video Course',
                'url' => 'https://www.git-tower.com/learn/',
                'type' => Resource::VIDEO_TYPE,
            ],
            [
                'name' => 'Git - The simple guide',
                'url' => 'https://rogerdudler.github.io/git-guide/',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Branch from Master, and Make Your First Commit Article',
                'url' => 'https://dev.to/taeluralexis/break-git-down-how-to-create-a-branch-from-master-and-make-your-first-commit-2960',
                'type' => Resource::ARTICLE_TYPE,
            ],
            [
                'name' => 'Wes Bos - Command Line Power User',
                'url' => 'https://commandlinepoweruser.com/',
                'type' => Resource::COURSE_TYPE,
            ],
            [
                'name' => 'The Laravel Podcast - Getting Good with Git, with Gemma Anible',
                'url' => 'https://laravelpodcast.com/episodes/git-with-gemma-anible',
                'type' => Resource::AUDIO_TYPE,
            ],
            [
                'name' => 'The Laravel Podcast - Tinker, Artisan, & CLI, with Nuno Maduro',
                'url' => 'https://laravelpodcast.com/episodes/tinker-artisan-cli-with-nuno-maduro',
                'type' => Resource::AUDIO_TYPE,
            ],
        ],
    ],
];
