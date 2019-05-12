<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
	public function getRole()
	{
		return view('layout.admin');
	}

	public function getPermission()
	{
		return view('layout.admin');
	}

	public function getRegistrationSetting()
	{
		return view('layout.admin');
	}
}