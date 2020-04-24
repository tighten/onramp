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
            'standardBeginnerModules' => Module::standard()->beginner()->get(),
            'standardIntermediateModules' => Module::standard()->intermediate()->get(),
            'standardAdvancedModules' => Module::standard()->advanced()->get(),
            'bonusModules' => Module::bonus()->get(),
        ]);
    }

    public function show($locale, Module $module, $resourceType)
    {
        return view('modules.show', [
            'pageTitle' => $module->name,
            'module' => $module,
            'resources' => $module->resourcesForCurrentSession,
            'skills' => $module->skills->where('is_bonus', false),
            'bonusSkills' => $module->skills->where('is_bonus', true),
            'completedModules' => auth()->check() ? auth()->user()->moduleCompletions()->pluck('completable_id') : collect([]),
            'completedResources' => auth()->check() ? auth()->user()->resourceCompletions()->pluck('completable_id') : collect([]),
            'completedSkills' => auth()->check() ? auth()->user()->skillCompletions()->pluck('completable_id') : collect([]),
            'currentResourceLanguagePreference' => Preferences::get('resource-language'),
            'resourceType' => $resourceType,
        ]);
    }
}
