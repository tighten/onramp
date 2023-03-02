<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Term;

class GlossaryController extends Controller
{
    public function index(): View
    {
        return view('glossary', [
            'pageTitle' => __('Glossary'),
            'terms' => Term::with(['resourcesForCurrentSession', 'relatedTerms'])->get(),
        ]);
    }
}
