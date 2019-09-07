<?php

namespace App\Exceptions;

use Exception;

class InvalidLocale extends Exception
{
    public function report()
    {
        // Do nothing; we don't need to send this up to Bugsnag
    }

    public function render($request)
    {
        return redirect('/');
    }
}
