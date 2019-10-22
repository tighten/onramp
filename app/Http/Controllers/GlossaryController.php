<?php

namespace App\Http\Controllers;

use App\Term;

class GlossaryController extends Controller
{
    public function index()
    {
        return view('glossary', [
            'pageTitle' => 'Glossary',
            'terms' => Term::with('resources')->get(),
        ]);
    }
}
