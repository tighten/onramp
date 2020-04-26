<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'modules' => auth()->check() && auth()->user()->hasTrack()
                ? auth()->user()->track->modules()->get()
                : collect([]),
            'completedModules' => auth()->check()
                ? auth()->user()->moduleCompletions()->pluck('completable_id')
                : collect([]),
        ]);
    }
}
