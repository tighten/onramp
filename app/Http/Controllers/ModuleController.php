<?php

namespace App\Http\Controllers;

use App\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index()
    {
        return view('modules.index', [
            'modules' => Module::all(),
            'completedModules' => auth()->user()->moduleCompletions()->pluck('completable_id'),
        ]);
    }

    public function show($locale, Module $module)
    {
        return view('modules.show', [
            'module' => $module,
            'resources' => $module->resources,
            'completedResources' => auth()->user()->resourceCompletions()->pluck('completable_id'),
            'completedSkills' => auth()->user()->skillCompletions()->pluck('completable_id'),
        ]);
    }
}
