<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class NewResourceController extends Controller
{
	public function index()
	{
		$resources = Resource::where('created_at', '>=', Carbon::now()->subDays(30))->get();

		return view('new-resources', [
			'resources' => $resources,
		]);
	}
}
