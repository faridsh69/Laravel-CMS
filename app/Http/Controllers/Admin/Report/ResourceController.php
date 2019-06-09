<?php

namespace App\Http\Controllers\Admin\Report;

use App\Base\BaseAdminController;

class ResourceController extends BaseAdminController
{
    public $model = 'Report';

    public function index()
    {
        return view('admin.report', ['meta' => $this->meta]);
    }
}
