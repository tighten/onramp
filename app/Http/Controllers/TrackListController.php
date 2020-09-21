<?php

namespace App\Http\Controllers;

use App\Module;
use App\Track;

class TrackListController extends Controller
{
    public function index()
    {
        $tracks = Track::has('modules')->get();
        $modulesWithTracks = Module::with('tracks')->get();

        $modules = $modulesWithTracks->reduce(function ($carry, $row) use ($tracks) {
            $hasTracks = $tracks->reduce(function ($carry, $track) use ($row) {
                $carry[$track->name] = $row->tracks->pluck('name')->contains($track->name);
                return $carry;
            }, []);

            $carry[$row->name] = [
                'module_name' => $row->name,
                'has_tracks' => $hasTracks,
            ];

            return $carry;
        }, []);

        return view('tracks', [
            'modules' => $modules,
            'tracks' => $tracks->pluck('name'),
        ]);
    }
}
