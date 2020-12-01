<?php

namespace App\Services;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BaseExport implements FromCollection, WithHeadings
{
    use BaseCmsTrait;

    public function collection()
    {
        return $this->modelRepository->select($this->modelColumns)->get();
    }

    public function headings(): array
    {
        return [$this->modelColumns];
    }

    public function setModelName($modelName)
    {
        $this->modelColumns = collect($this->modelRepository->getColumns())
            ->where('database', '!=', 'none')
            ->pluck('name')
            ->toArray();
        $this->modelColumns[] = 'created_at';
        $this->modelColumns[] = 'updated_at';
        $this->modelColumns[] = 'deleted_at';
    }
}
