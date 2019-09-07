<?php

namespace App\Exceptions;

use Exception;

class InvalidLocale extends Exception
{
    public function render($request)
    {
        return redirect('/');
    }
}
