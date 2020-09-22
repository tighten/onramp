<?php

namespace App\Http\Controllers;

use App\Track;

class TrackController extends Controller
{
    public function index()
    {
        $tracks = Track::has('modules')->with('modules')->get();

        return view('tracks', [
            'tracks' => $tracks,
            'modules' => $tracks->flatMap->modules->unique->id->sort(),
        ]);
    }
}
