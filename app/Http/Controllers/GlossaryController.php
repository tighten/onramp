<?php

namespace App\Http\Controllers;

use App\Models\Term;
use Illuminate\View\View;

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
