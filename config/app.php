<?php

declare(strict_types=1);

use App\Facades\Localization;
use App\Facades\Preferences;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Redis;

return [

    'aliases' => Facade::defaultAliases()->merge([
        'ExportLocalization' => 'KgBot\\LaravelLocalization\\Facades\\ExportLocalization',
        'Localization' => Localization::class,
        'Preferences' => Preferences::class,
        'Redis' => Redis::class,
    ])->toArray(),

];
