<?php

namespace App\Forms;

use App\Services\BaseForm;

class Form extends BaseForm
{
	public function __construct()
    {
        $this->model_name = ucfirst(\Request::segment(2));
        $class_name = 'App\\Models\\' . $this->model_name;
        $model = new $class_name();
        $this->columns = $model->getColumns();
    }
}
