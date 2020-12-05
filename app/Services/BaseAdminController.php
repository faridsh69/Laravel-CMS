<?php

namespace App\Services;

use App\Http\Controllers\Controller;

class BaseAdminController extends Controller
{
    use BaseCmsTrait;

    /*
    * Meta to use in page header.
    */
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
