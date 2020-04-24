<?php

namespace App\Http\Controllers;

use App\Module;

class HomeController extends Controller
{
    public function index()
    {
        $allModules = auth()->user()->track->modules()->get();
        $completedModules = auth()->user()->moduleCompletions()->pluck('completable_id');

        $modules = collect($allModules)->filter(function ($module) use ($completedModules) {
            return ! $completedModules->contains($module->id);
        });

        $completedModules = collect($completedModules)->map(function ($moduleId) {
            return Module::where('id', $moduleId)->first();
        });

        return view('home', [
            'modules' => $modules,
            'completedModules' => $completedModules,
        ]);
    }
}
