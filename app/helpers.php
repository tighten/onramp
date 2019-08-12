<?php

function locale()
{
    return app(App\ResolveLocale::class)();
}

function url_wlocale($path)
{
    return url(locale() . '/' . $path);
}

function route_wlocale($route, $parameters = [])
{
    return url(locale() . route($route, $parameters, false));
}

function switch_locale($newLocale)
{
    $segments = Request::segments();
    $segments[0] = $newLocale;

    return url(implode($segments, '/'));
}
