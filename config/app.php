<?php

use Illuminate\Support\Facades\Facade;

return [

    'aliases' => Facade::defaultAliases()->merge([
        'ExportLocalization' => 'KgBot\\LaravelLocalization\\Facades\\ExportLocalization',
        'Localization' => App\Facades\Localization::class,
        'Preferences' => App\Facades\Preferences::class,
        'Redis' => Illuminate\Support\Facades\Redis::class,
    ])->toArray(),

];
