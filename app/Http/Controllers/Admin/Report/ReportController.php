<?php

namespace App\Http\Controllers\Admin\Report;

use App\Base\BaseAdminController;

class ReportController extends BaseAdminController
{
    public function index()
    {
    	$this->authorize('index_settingdeveloper');
    	$this->meta['title'] = 'Report Manager';
    	
        return view('admin.report', ['meta' => $this->meta]);
    }
}
