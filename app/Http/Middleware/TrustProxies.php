<?php

namespace App\Http\Middleware;

use Fideloper\Proxy\TrustProxies as Middleware;

class TrustProxies extends Middleware
{
    /**
     * The trusted proxies for this application.
     */
    protected $proxies;

    /**
     * The headers that should be used to detect proxies.
     */
    protected $headers = Request::HEADER_X_FORWARDED_ALL;
}
