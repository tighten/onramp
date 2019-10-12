<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LearnController extends Controller
{
    public function __invoke()
    {
        return view('learn', [
            'learn' => require(base_path('learn.php')),
            'pageTitle' => __('Learn Laravel Now'),
        ]);
    }
}
