<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use Rap2hpoutre\LaravelLogViewer\LogViewerController;

class SettingController extends Controller
{
	public function getGeneral()
	{
		return view('admin.blog');
	}

	public function getContact()
	{
		return view('admin.blog');
	}

	public function getLog(LogViewerController $LogViewerController)
	{
		return $LogViewerController->index();
	}

	public function getDeveloperOptionsBasic()
	{
		return view('admin.blog');
	}

	public function getDeveloperOptionsAdvance()
	{
		return view('admin.blog');
	}
}
