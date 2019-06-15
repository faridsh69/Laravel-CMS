<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Base\BaseAdminController;

class DashboardController extends BaseAdminController
{
    public function index()
    {
        $this->meta['title'] = __('Dashboard');
        $this->meta['alert'] = 'Admin Panel Dashboard For Best Cms In The World With LARAVEL!';

        return view('admin.report', ['meta' => $this->meta]);
    }
}
