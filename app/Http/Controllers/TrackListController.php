<?php

namespace App\Http\Controllers;

use App\Module;
use App\Track;
use Illuminate\Database\Eloquent\Collection;

class TrackListController extends Controller
{
    public function index()
    {
        $tracks = Track::has('modules')->with('modules')->get();

        return view('tracks', [
            'modules' => $this->tracksForTable($tracks),
            'tracks' => $tracks,
        ]);
    }

    public function tracksForTable(Collection $tracks)
    {
        return $tracks->flatMap(function ($track) {
            return $track->modules;

            // @todo de-duplicate modules
        })->mapWithKeys(function ($module) use ($tracks) {
            return [$module->name => $this->moduleForTable($module, $tracks)];
        })->sort()->toArray();
    }

    public function moduleForTable(Module $module, $tracks)
    {
        return  [
            'module_name' => $module->name,
            'has_tracks' => $tracks->mapWithKeys(function ($track) use ($module) {
                return [$track->name => $track->modules->pluck('id')->contains($module->id)];
            })->toArray(),
        ];
    }
}
