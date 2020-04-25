<?php

namespace App\Services;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Http\Controllers\Controller;
use Str;

class BaseAdminController extends Controller
{
    public $meta = [
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
