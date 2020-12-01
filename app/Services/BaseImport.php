<?php

namespace App\Services;

use Maatwebsite\Excel\Concerns\ToModel;

class BaseImport implements ToModel
{
    use BaseCmsTrait;

    public $modelFields;

    public $excelFields;

    public function model(array $row)
    {
        foreach($this->modelFields as $key => $modelField)
        {
            $this->excelFields[$modelField] = $row[$key];
        }
        return new $this->modelNamespace($this->excelFields);
    }

    public function setModelName($modelName)
    {
        $this->modelNamespace = config('cms.config.models_namespace') . $modelName;
        $this->modelRepository = new $this->modelNamespace();
        $this->modelFields = collect($this->modelRepository->getColumns())->pluck('name')->toArray();
        $this->excelFields = [];
    }
}
