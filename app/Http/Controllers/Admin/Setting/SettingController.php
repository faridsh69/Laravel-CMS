<?php

namespace App\Http\Controllers\Admin\Setting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
	public function getGeneral()
	{
		return view('layout.admin');
	}

	public function getContact()
	{
		return view('layout.admin');
	}

	public function getLog()
	{
		return view('layout.admin');
	}
	
	public function getDeveloperOptionsBasic()
	{
		return view('layout.admin');
	} 

	public function getDeveloperOptionsAdvance()
	{
		return view('layout.admin');
	} 	  
}