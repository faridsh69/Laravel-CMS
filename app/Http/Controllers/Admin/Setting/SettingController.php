<?php

namespace App\Http\Controllers\Admin\Setting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
	public function getGeneral()
	{
		return view('admin.blog');
	}

	public function getContact()
	{
		return view('admin.blog');
	}

	public function getLog()
	{
		return view('admin.blog');
	}

	public function getBackup()
	{
		return view('admin.blog');
	}	 
	
	public function getDeveloperOptionsBasic()
	{
		return view('admin.blog');
	} 

	public function getDeveloperOptionsAdvance()
	{
		return view('admin.blog');
	} 	  
}