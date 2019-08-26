<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LearnController extends Controller
{
    public function __invoke()
    {
        return view('learn', [
            'learn' => require(base_path('learn.' . locale() . '.php')),
            'pageTitle' => __('Learn Laravel Now'),
        ]);
    }
}
