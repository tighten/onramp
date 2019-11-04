<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RootRedirectController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if (auth()->user()) {
            return redirect(auth()->user()->preferences('language', 'en'));
        }

        return redirect('en');
    }
}
