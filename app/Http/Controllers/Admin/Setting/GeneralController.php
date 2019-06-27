<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Admin\Setting\SettingController;

class GeneralController extends SettingController
{
	public $model = 'SettingGeneral';
	public $section = 'general';

	public function index()
	{
		return $this->getSettingForm($this->section);
	}

	public function update()
	{
        return $this->putSettingForm($this->section);
	}

	public function redirect()
	{
		return redirect()->route('admin.setting.general');
	}
}