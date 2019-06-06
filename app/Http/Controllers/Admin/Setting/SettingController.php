<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Base\BaseAdminController;
use Rap2hpoutre\LaravelLogViewer\LogViewerController;

class SettingController extends BaseAdminController
{
	public $model = 'Setting';
	// public $meta = [
 //        'title' => 'Settings Manager',
 //        'description' => 'Admin Panel Page For Best Cms In The World',
 //        'keywords' => '',
 //        'image' => '',
 //        'alert' => 'Advanced form with validation, ckeditor, multiselect, swith... !',
 //        'link_route' => '/',
 //        'link_name' => 'Dashboard',
 //        'search' => 0,
 //    ];

	public function getGeneral()
	{
		return view('admin.blog');
	}

	public function getContact()
	{
		return view('admin.blog');
	}

	public function getLog()
	{
        $this->meta['title'] = __('Log Manager');
        $this->meta['alert'] = 'Log of system with all traces!';

		return view('admin.setting.log', ['meta' => $this->meta]);
	}

	public function getLogView(LogViewerController $LogViewerController)
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

	public function getDeveloperOptionsApi()
	{
        $this->meta['title'] = __('API Manager');

		return view('admin.setting.developer-options.api', ['meta' => $this->meta]);
	}
}
