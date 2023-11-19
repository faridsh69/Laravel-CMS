<?php

declare(strict_types=1);

namespace App\Cms\Services;

use App\Cms\Traits\CmsMainTrait;
use Maatwebsite\Excel\Concerns\ToModel;

final class ImportService implements ToModel
{
	use CmsMainTrait;

	public $modelFields;

	public $excelFields;

	public function model(array $row)
	{
		foreach ($this->modelFields as $key => $modelField) {
			$this->excelFields[$modelField] = $row[$key];
		}

		return new $this->modelNamespace($this->excelFields);
	}

	public function setModelName($modelName): void
	{
		$this->modelNamespace = config('cms.config.models_namespace') . $modelName;
		$this->modelRepository = new $this->modelNamespace();
		$this->modelFields = collect($this->modelRepository->getColumns())->pluck('name')->toArray();
		$this->excelFields = [];
	}
}
