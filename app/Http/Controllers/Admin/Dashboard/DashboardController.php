<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Base\AdminController;

class DashboardController extends AdminController
{
    public $model = 'Dashboard';
    public $model_sm = 'dashboard';

    public function index()
    {
        $this->meta['title'] = __($this->model . '');
        $this->meta['alert'] = 'Admin Panel Dashboard For Best Cms In The World With LARAVEL!';

        return view('admin.dashboard', ['meta' => $this->meta]);
    }
}
