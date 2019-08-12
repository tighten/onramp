<?php

function locale()
{
    return app(App\ResolveLocale::class)();
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
    return route($route, array_merge($parameters, ['locale' => locale()]));
}

function switch_locale($newLocale)
{
    $segments = Request::segments();
    $segments[0] = $newLocale;

    return url(implode($segments, '/'));
}
