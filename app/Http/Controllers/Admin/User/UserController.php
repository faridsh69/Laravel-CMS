<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
	public function getRole()
	{
		return view('admin.blog');
	}

	public function getPermission()
	{
		return view('admin.blog');
	}

	public function getRegistrationSetting()
	{
		return view('admin.blog');
	}
}