<?php

namespace App\Http\Controllers;

use App\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    public function update(Request $request)
    {
        $track = Track::where([
            'id' => $request->user()->track->id,
        ])->first();

        $track->modules()->attach($request->input('module_id'));

        session()->flash('toast', 'Module successfully added!');

        return back();
    }
}
