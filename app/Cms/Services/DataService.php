<?php

declare(strict_types=1);

namespace App\Cms\Services;

use Cache;
use Hash;
use Str;

final class DataService extends Service
{
	/*
	* This is the main method in this cms, we are defining all models columns here,
	* name: Define name of the column in database and forms and everywhere
	* type: string, text, boolean, integer, decimal, array (for tags), file (image uploader)
	* database: nullable, default(1), none (Dont create that column)
	* rule: required, min, max, nullable, unique
	* help: A hint in forms under the input
	* form_type: textarea, ckeditor, switch-m, checkbox-m, switch-bootstrap-m, entity, enum, file, number, time, date, , color. Defines the type of form input.
	* table: true or false, shows that this column in showing in table or not.
	*/
	public function getColumns(string $modelName, array $brifColumns): array
	{
		return Cache::remember(
			'model_' . $modelName,
			config('cms.config.cache_time'),
			function () use ($brifColumns) {
				$default_columns = config('cms.default_columns');

				$columns = $brifColumns;

				foreach ($columns as $key => $column) {
					if (isset($column['same_column_name'])) {
						$columns[$key] = $default_columns[$column['same_column_name']];
						$columns[$key]['name'] = $column['name'];
					} elseif (\array_key_exists($column['name'], $default_columns) && !isset($column['type'])) {
						$columns[$key] = $default_columns[$column['name']];
					} elseif (!isset($columns[$key]['type'])) {
						$columns[$key]['type'] = 'text';
						$columns[$key]['database'] = 'nullable';
						$columns[$key]['form_type'] = '';
					}
				}

				return $columns;
			}
		);
	}

	public function saveWithRelations($data, $isUpdating, $model)
	{
		$columns = $model->getColumns();
		$formDataWitoutUploadFilesAndArrays = $this->clearFilesAndArrays($data, $columns, $isUpdating, $model);
		if ($isUpdating) {
			$model->update($formDataWitoutUploadFilesAndArrays);
		} else {
			$model = $model->create($formDataWitoutUploadFilesAndArrays);
		}
		$this->saveRelatedDataAfterCreate($data, $columns, $model);

		return $model;
	}

	private function saveRelatedDataAfterCreate(array $data, array $columns, $model): void
	{
		// Upload all columns with type file.
		foreach (collect($columns)
			->where('type', 'file')
			->pluck('name') as $fileColumn) {
			if (isset($data[$fileColumn]) && $data[$fileColumn]) {
				$file = $data[$fileColumn];
				$fileService = new FileService();
				$fileService->save($file, $model, $fileColumn);
			}
		}

		// save relations with array type column like tags, related_models, etc.
		foreach (collect($columns)
			->where('type', 'array')
			->pluck('name') as $arrayColumn) {
			if (isset($data[$arrayColumn]) && $data[$arrayColumn]) {
				$model->{$arrayColumn}()->sync($data[$arrayColumn]);
			}
		}
	}

	private function clearFilesAndArrays(array $data, array $columns, int $isUpdating, $model): array
	{
		// convert boolean input values: null and false => 0, true => 1
		foreach (collect($columns)
			->where('type', 'boolean')
			->pluck('name') as $boolean_column) {
			if (!isset($data[$boolean_column])) {
				$data[$boolean_column] = 0;
			}
		}

		// unset file and array attributes before saving
		foreach (collect($columns)
			->whereIn('type', ['file', 'array', 'captcha'])
			->pluck('name') as $file_or_array_column) {
			unset($data[$file_or_array_column]);
		}

		if (class_basename($model) === 'User') {
			unset($data['password_confirmation']);
			if (isset($data['password'])) {
				$data['password'] = Hash::make($data['password']);
			} else {
				if ($isUpdating) {
					$data['password'] = $model->password;
				} else {
					$data['password'] = Hash::make(123456);
				}
			}
		}

		if (class_basename($model) === 'Like') {
			$modelName = Str::studly($data['likeable_type']);
			$data['likeable_type'] = config('cms.config.models_namespace') . $modelName;
		}

		return $data;
	}
}
