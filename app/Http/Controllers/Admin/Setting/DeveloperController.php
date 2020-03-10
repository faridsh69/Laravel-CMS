<?php

namespace App\Http\Controllers\Admin\Setting;

class DeveloperController extends SettingController
{
	public $model = 'SettingDeveloper';

	public function index()
	{
		return $this->getSettingForm();
	}

	public function putUpdate()
	{
        return $this->putSettingForm();
	}
}
