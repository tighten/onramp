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
        ]);
    }

    public function show($locale, Module $module)
    {
        return view('modules.show', [
            'module' => $module,
        ]);
    }
}
