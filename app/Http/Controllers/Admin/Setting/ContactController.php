<?php

namespace App\Http\Controllers\Admin\Setting;

class ContactController extends SettingController
{
	public $model = 'SettingContact';

	public function index()
	{
		return $this->getSettingForm();
	}

	public function update()
	{
        return $this->putSettingForm();
	}
}
