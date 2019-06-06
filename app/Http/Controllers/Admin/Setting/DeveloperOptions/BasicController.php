<?php

namespace App\Http\Controllers\Admin\Setting\DeveloperOptions;

use App\Base\BaseAdminController;

class BasicController extends BaseAdminController
{
	public $model = 'SettingBasic';
	public $section = 'basic';

	public function index()
	{
		return $this->getSettingForm($this->section);
	}

	public function update()
	{
        return $this->putSettingForm($this->section);
	}
}