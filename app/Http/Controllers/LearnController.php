<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LearnController extends Controller
{
    protected $locales = [
        'en',
        'es',
    ];

    public function __invoke($locale = 'en')
    {
        if (! in_array($locale, $this->locales)) {
            return redirect('/');
        }

        App::setLocale($locale);

        return view('learn', [
            'learn' => require(base_path("learn.$locale.php")),
            'local' => $locale,
        ]);
    }
}
