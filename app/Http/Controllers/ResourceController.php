<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ResourceController extends Controller
{
	public function index(): View
	{
		return view('new-resources');
	}
}
