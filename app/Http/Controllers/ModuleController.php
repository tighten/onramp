<?php

namespace App\Http\Controllers;

use App\Facades\Preferences;
use App\Module;

class ModuleController extends Controller
{
    public function index()
    {
        return view('modules.index', [
            'pageTitle' => 'Modules',
            'modules' => Module::all(),
            'completedModules' => auth()->check() ? auth()->user()->moduleCompletions()->pluck('completable_id') : collect([]),
        ]);
    }

    public function show($locale, Module $module)
    {
        return view('modules.show', [
            'pageTitle' => $module->name,
            'module' => $module,
            'resources' => $module->resourcesForUser,
            'skills' => $module->skills->where('is_bonus', false),
            'bonusSkills' => $module->skills->where('is_bonus', true),
            'completedResources' => auth()->check() ? auth()->user()->resourceCompletions()->pluck('completable_id') : collect([]),
            'completedSkills' => auth()->check() ? auth()->user()->skillCompletions()->pluck('completable_id') : collect([]),
            'currentResourceLanguagePreference' => Preferences::get('resource-language-preference'),
        ]);
    }
}
