<?php

namespace App\Http\Controllers;

use App\Facades\Preferences;
use App\Models\Module;
use Illuminate\View\View;

class ModuleController extends Controller
{
    public function index(): View
    {
        return view('modules.index', [
            'pageTitle' => __('Modules'),
            'standardModules' => auth()->check() && auth()->user()->hasTrack()
                ? Module::with('resourcesForCurrentSession')->standard()->get()
                : Module::standard()->get(),
            'bonusModules' => auth()->check() && auth()->user()->hasTrack()
                ? Module::with('resourcesForCurrentSession')->bonus()->get()
                : Module::bonus()->get(),
            'userModules' => auth()->check() && auth()->user()->hasTrack()
                ? auth()->user()->track->modules()->get()->pluck('id')
                : collect([]),
            'completedModules' => auth()->check()
                ? auth()->user()->moduleCompletions()->pluck('completable_id')
                : collect([]),
            'userResourceCompletions' => auth()->check() && auth()->user()->hasTrack()
                ? auth()->user()->resourceCompletions()->get()->pluck('completable_id')
                : collect([]),
        ]);
    }

    public function show($locale, Module $module, $resourceType): View
    {
        return view('modules.show', [
            'pageTitle' => $module->name,
            'module' => $module,
            'resources' => $module->resourcesForCurrentSession,
            'skills' => $module->skills,
            'completedModules' => auth()->check() ? auth()->user()->moduleCompletions()->pluck('completable_id') : collect([]),
            'completedResources' => auth()->check() ? auth()->user()->resourceCompletions()->pluck('completable_id') : collect([]),
            'completedSkills' => auth()->check() ? auth()->user()->skillCompletions()->pluck('completable_id') : collect([]),
            'currentResourceLanguagePreference' => Preferences::get('resource-language'),
            'resourceType' => $resourceType,
            'previousModule' => $module->getPrevious(),
            'nextModule' => $module->getNext(),
        ]);
    }
}
