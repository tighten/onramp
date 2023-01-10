<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Seeder Directory
    |--------------------------------------------------------------------------
    |
    | Determines the directory the json seeder files are stored in after they
    | are created.
    |
    */
    'directory' => env('JSON_SEEDS_DIRECTORY', 'database/json'),

    'extension' => env('JSON_SEEDS_FILE_EXTENSION', 'json'),
];
