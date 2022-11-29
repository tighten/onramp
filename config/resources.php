<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Expiration Length
    |--------------------------------------------------------------------------
    |
    | Determines how long a resource will stay on Onramp before it is expires
    | and becomes due for renewal. Default value is 6 (months).
    |
    */

    'default_expiration_length' => env('ONRAMP_RESOURCE_EXPIRATION', 6),
];
