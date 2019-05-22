<?php

namespace App\Http\Controllers\Admin\Seo;

use App\Http\Controllers\Controller;

class SeoController extends Controller
{
	public function getSetting()
	{
		return view('admin.blog');
	}

	public function getContentRules()
	{
		return view('admin.blog');
	}

	public function getLazyLoading ()
	{
		return view('admin.blog');
	}
}
