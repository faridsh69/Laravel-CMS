<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BaseExport implements FromCollection, WithHeadings
{
	public $fields;
    public $model;

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->model->select($this->fields)->get();
    }

    public function headings(): array
    {
        return [$this->fields];
    }

    public function setModel($model)
    {
        $class_name = 'App\\Models\\' . $model;
        $this->model = new $class_name;
        $this->fields = collect($this->model->getColumns())->pluck('name')->toArray();
        $this->fields[] = 'created_at';
        $this->fields[] = 'updated_at';
        $this->fields[] = 'deleted_at';
    }
}
