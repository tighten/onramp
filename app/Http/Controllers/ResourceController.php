<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Carbon\Carbon;
use Illuminate\View\View;

class ResourceController extends Controller
{
    public function index(): View
    {
        $resources = Resource::where('created_at', '>=', Carbon::now()->subDays(30))
            ->with('modules') // Eager load the module relationship
            ->get();

        return view('new-resources', [
            'pageTitle' => __('New Resources'),
            'resources' => $resources,
        ]);
    }
}
