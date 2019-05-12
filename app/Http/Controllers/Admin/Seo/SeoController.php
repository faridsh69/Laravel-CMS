<?php

namespace App\Http\Controllers\Admin\Seo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeoController extends Controller
{
	public function getSetting()
	{
		return view('layout.admin');
	}

	public function getContentRules()
	{
		return view('layout.admin');
	}

	public function getLazyLoading ()
	{
		return view('layout.admin');
	}
}