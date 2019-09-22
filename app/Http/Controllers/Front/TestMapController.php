<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Str;

class TestMapController extends Controller
{
	public function getOffline()
	{
		return view('front.test.map.offline');
	}
}
