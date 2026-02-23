<?php

return [

    'connections' => [
        'mysql_tunnel' => [
            'driver' => 'mysql',
            'host' => env('TUNNELER_LOCAL_ADDRESS'),
            'port' => env('TUNNELER_LOCAL_PORT'),
            'database' => env('DB_DATABASE_SYNC'),
            'username' => env('DB_USERNAME_SYNC'),
            'password' => env('DB_PASSWORD_SYNC'),
            'charset' => env('DB_CHARSET', 'utf8'),
            'collation' => env('DB_COLLATION', 'utf8_unicode_ci'),
            'prefix' => env('DB_PREFIX', ''),
            'timezone' => env('DB_TIMEZONE', '+00:00'),
            'strict' => env('DB_STRICT_MODE', false),
        ],
    ],

    'migrations' => [
        'table' => 'migrations',
        'update_date_on_publish' => false, // disable to preserve original behavior for existing applications
    ],

];
