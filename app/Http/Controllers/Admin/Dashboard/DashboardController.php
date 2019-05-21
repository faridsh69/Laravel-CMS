<?php

namespace App\Http\Controllers\Admin\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
	public function index()
	{
		$meta = [
            'title' => __('Dashboard'),
            'description' => __('Admin Panel Page For Best Cms In The World'),
            'image' => \Cdn::asset('upload/images/logo.png'),
            'alert' => 'Dashboard show a lot of chart and etc.',
            'link_route' => route('admin.blog.list.create'),
            'link_name' => __('Create New Blog'),
        ];

		return view('admin.dashboard', compact('meta'));
	}
}