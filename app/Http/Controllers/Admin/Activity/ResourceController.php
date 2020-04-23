<?php

namespace App\Http\Controllers\Admin\Activity;

use App\Services\BaseListController;

class ResourceController extends BaseListController
{
    public $model_name = 'Activity';

    public function create(){return $this->getRedirect(); }

    public function edit($id){return $this->getRedirect(); }

    public function update($id){return $this->getRedirect(); }
}
