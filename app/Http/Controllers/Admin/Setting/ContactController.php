<?php

namespace App\Http\Controllers\Admin\Setting;

class ContactController extends SettingController
{
	public $model = 'SettingContact';

	public function index()
	{
		return $this->getSettingForm();
	}

	public function putUpdate()
	{
        return $this->putSettingForm();
	}
}
