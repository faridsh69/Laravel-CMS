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
        $model_namespace = config('cms.config.models_namespace'). $this->model_name;
        $model_repository = new $model_namespace;
        $this->model_columns = $model_repository->getColumns();
    }
}
