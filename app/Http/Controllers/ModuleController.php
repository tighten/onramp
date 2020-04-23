<?php

namespace App\Http\Controllers;

use App\Facades\Preferences;
use App\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index()
    {
        return view('modules.index', [
            'pageTitle' => 'Modules',
            'standardModules' => Module::standard()->get(),
            'bonusModules' => Module::bonus()->get(),

            // @todo use this for the My Modules page
            // 'standardModules' => auth()->check() && auth()->user()->track ? auth()->user()->track->modules()->standard()->get() : Module::standard()->get(),
            // 'bonusModules' => auth()->check() && auth()->user()->track ? auth()->user()->track->modules()->bonus()->get() : Module::bonus()->get(),
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
