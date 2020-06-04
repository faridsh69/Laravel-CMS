<?php

namespace App\Services;

use Maatwebsite\Excel\Concerns\ToModel;

class BaseImport implements ToModel
{
    public $model_fields;

    public $excel_fields;

    public $model_repository;

    public $model_namespace;

    public function model(array $row)
    {
        foreach($this->model_fields as $key => $model_field)
        {
            $this->excel_fields[$model_field] = $row[$key];
        }
        return new $this->model_namespace($this->excel_fields);
    }

    public function setModelName($model_name)
    {
        $this->model_namespace = config('cms.config.models_namespace') . $model_name;
        $this->model_repository = new $this->model_namespace();
        $this->model_fields = collect($this->model_repository->getColumns())->pluck('name')->toArray();
        $this->excel_fields = [];
    }
}
