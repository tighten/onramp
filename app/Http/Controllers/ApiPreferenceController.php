<?php

namespace App\Http\Controllers;

use App\Facades\Preferences;
use Illuminate\Http\Request;

class ApiPreferenceController extends Controller
{
    public function store(Request $request)
    {
        // @todo Add a keys() method to app/Preferences/Preferences and use that
        //       to build up the data passed into Preferences::set()
        Preferences::set([
            'resource-language' => $request->get('resource-language', Preferences::get('resource-language')),
            'locale' => $request->get('locale', Preferences::get('locale')),
            'operating-system' => $request->get('operating-system', Preferences::get('operating-system')),
        ]);

        return response()->json([
            'status' => 'success',
            'preferences' => [
                'resource-language' => Preferences::get('resource-language'),
                'locale' => Preferences::get('locale'),
                'operating-system' => Preferences::get('operating-system'),
            ],
        ]);

    }
}
