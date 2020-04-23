<?php

namespace App\Forms;

use App\Services\BaseForm;
use Str;
use Request;

class Form extends BaseForm
{
	public function __construct()
    {
        $this->model_name = Str::studly(Request::segment(2));
        $class_name = 'App\\Models\\' . $this->model_name;
        $model = new $class_name();
        $this->columns = $model->getColumns();
    }
}
