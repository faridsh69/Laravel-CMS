<?php

declare(strict_types=1);

namespace App\Cms\Controllers\Admin;

use App\Cms\Traits\CmsMainTrait;
use App\Http\Controllers\Controller;

abstract class AdminController extends Controller
{
	use CmsMainTrait;

	// Meta to use in page header.
	public array $meta = [
		'title' => 'Manager',
		'description' => 'Admin Panel Page For Full Features, Best UI-UX Cms.',
		'keywords' => '',
		'image' => '',
		'alert' => '',
		'link_route' => '/admin/dashboard',
		'link_name' => 'Dashboard',
		'search' => 0,
	];
}
