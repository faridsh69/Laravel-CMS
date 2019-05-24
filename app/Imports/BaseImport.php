<?php

namespace App\Imports;

use App\Models\Blog;
use Maatwebsite\Excel\Concerns\ToModel;

class BaseImport implements ToModel
{
    public $model_fields;
    public $excel_fields;
    public $model;
    public $class_name;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        foreach($this->model_fields as $key => $model_field)
        {
            $this->excel_fields[$model_field] = $row[$key];
        }
        $output = new $this->class_name($this->excel_fields);

        return $output;
    }

    public function setModel($model)
    {
        $this->class_name = 'App\\Models\\' . $model;
        $this->model = new $this->class_name;
        $this->model_fields = collect($this->model->getColumns())->pluck('name')->toArray();
        $this->excel_fields = [];
    }
}
