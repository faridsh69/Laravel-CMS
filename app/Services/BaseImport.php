<?php

namespace App\Services;

use Maatwebsite\Excel\Concerns\ToModel;

class BaseImport implements ToModel
{
    public $model_fields;

    public $excel_fields;

    public $modelRepository;

    public $modelNamespace;

    public function model(array $row)
    {
        foreach($this->model_fields as $key => $model_field)
        {
            $this->excel_fields[$model_field] = $row[$key];
        }
        return new $this->modelNamespace($this->excel_fields);
    }

    public function setModelName($modelName)
    {
        $this->modelNamespace = config('cms.config.models_namespace') . $modelName;
        $this->modelRepository = new $this->modelNamespace();
        $this->model_fields = collect($this->modelRepository->getColumns())->pluck('name')->toArray();
        $this->excel_fields = [];
    }
}
