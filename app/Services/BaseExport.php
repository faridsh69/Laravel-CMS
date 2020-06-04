<?php

namespace App\Services;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BaseExport implements FromCollection, WithHeadings
{
	public $model_columns;

    public $model_repository;

    public function collection()
    {
        return $this->model_repository->select($this->model_columns)->get();
    }

    public function headings(): array
    {
        return [$this->model_columns];
    }

    public function setModelName($model_name)
    {
        $model_namespace = config('cms.config.models_namespace') . $model_name;
        $this->model_repository = new $model_namespace();
        $this->model_columns = collect($this->model_repository->getColumns())
            ->where('database', '!=', 'none')
            ->pluck('name')
            ->toArray();
            $this->model_columns[] = 'created_at';
            $this->model_columns[] = 'updated_at';
            $this->model_columns[] = 'deleted_at';
    }
}
