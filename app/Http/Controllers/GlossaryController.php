<?php

namespace App\Http\Controllers;

use App\Term;
use function compact;

class GlossaryController extends Controller
{
    public function index()
    {
        $terms = Term::all();

        return view('glossary', compact('terms'));
    }
}
