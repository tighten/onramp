<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\View\View;

class TrackController extends Controller
{
    public function index(): View
    {
        $tracks = Track::has('modules')->with('modules')->get();

        return view('tracks', [
            'tracks' => $tracks,
            'modules' => $tracks->flatMap->modules->unique->id->sort(),
        ]);
    }
}
