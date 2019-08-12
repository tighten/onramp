<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

class LearnController extends Controller
{
    public function __invoke()
    {
        $locale = Route::current()->parameter('locale');

        return view('learn', [
            'learn' => require(base_path("learn.$locale.php")),
            'pageTitle' => __('Learn Laravel Now'),
        ]);
    }
}
