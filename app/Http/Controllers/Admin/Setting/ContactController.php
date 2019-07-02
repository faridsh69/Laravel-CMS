<?php

namespace App\Http\Controllers\Admin\Setting;

// use App\Http\Controllers\Admin\Setting\SettingController;

class ContactController extends SettingController
{
	public $model = 'SettingContact';

	public $section = 'contact';

	public function index()
	{
		return $this->getSettingForm($this->section);
	}

	public function update()
	{
        return $this->putSettingForm($this->section);
	}
}
