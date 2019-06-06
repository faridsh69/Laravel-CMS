<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Base\BaseAdminController;

class GeneralController extends BaseAdminController
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