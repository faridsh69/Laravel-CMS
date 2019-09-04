<?php

namespace App\Http\Controllers\Admin\Setting;

class GeneralController extends SettingController
{
	public $model = 'SettingGeneral';

	public function index()
	{
		return $this->getSettingForm();
	}

	public function update()
	{
        return $this->putSettingForm();
	}

	public function redirect()
	{
		return redirect()->route('admin.setting.general');
	}
}
