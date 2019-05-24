<?php

namespace App\Imports;

use App\Models\Blog;
use Maatwebsite\Excel\Concerns\ToModel;

class BaseImport implements ToModel
{
    public $fields;
    public $model;
    public $class_name;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $fields = [
            'url' => $row[1],
            'title' => $row[2],
            'content' => $row[3],
            'meta_description' => $row[4],
        ];
        $output = new $this->class_name($fields);
        
        return $output;
    }

    public function setModel($model)
    {
        $this->class_name = 'App\\Models\\' . $model;
        $this->model = new $this->class_name;
        $this->fields = collect($this->model->getColumns())->pluck('name')->toArray();
    }
}
