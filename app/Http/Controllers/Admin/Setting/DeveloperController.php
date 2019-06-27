<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Admin\Setting\SettingController;

class DeveloperController extends SettingController
{
	public $model = 'SettingDeveloper';
	public $section = 'developer';

	public function index()
	{
		return $this->getSettingForm($this->section);
	}

	public function update()
	{
        return $this->putSettingForm($this->section);
	}
}