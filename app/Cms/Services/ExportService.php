<?php

declare(strict_types=1);

namespace App\Cms\Services;

use Maatwebsite\Excel\Concerns\{FromCollection, WithHeadings};

final class ExportService implements FromCollection, WithHeadings
{
	public $model_columns;

	public $model_repository;

	public function collection()
	{
		return $this->modelRepository->select($this->modelColumns)->get();
	}

	public function headings(): array
	{
		return [$this->modelColumns];
	}

	public function setModelName($modelName): void
	{
		$modelNamespace = config('cms.config.models_namespace') . $modelName;
		$this->modelRepository = new $modelNamespace();
		$this->modelColumns = collect($this->modelRepository->getColumns())
			->where('database', '!=', 'none')
			->pluck('name')
			->toArray();
		$this->modelColumns[] = 'created_at';
		$this->modelColumns[] = 'updated_at';
		$this->modelColumns[] = 'deleted_at';
	}
}
