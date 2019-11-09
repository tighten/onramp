<?php

function locale()
{
    return app(App\Localization\ResolveLocale::class)();
}

function path_wlocale($path)
{
    return locale() . '/' . $path;
}

function url_wlocale($path)
{
    return url(path_wlocale($path));
}

function route_wlocale($route, $parameters = [])
{
    if (! is_array($parameters)) {
        $parameters = [$parameters];
    }

    return route($route, array_merge($parameters, ['locale' => locale()]));
}

function switch_locale_link($newLocale)
{
    $segments = Request::segments();
    $segments[0] = $newLocale;

    return url(implode('/', $segments));
}
