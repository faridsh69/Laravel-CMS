<?php

declare(strict_types=1);

namespace App\Cms\Services;

use Illuminate\Database\Eloquent\Factories\Factory as LaravelFactory;
use Illuminate\Http\UploadedFile;
use Str;

final class FactoryService extends LaravelFactory
{
	protected $model = 'App\Models\User';

	private string $modelNameSlug = '';

	public function setModelNameSlug(string $modelNameSlug): self
	{
		$this->modelNameSlug = $modelNameSlug;

		return $this;
	}

	public function definition()
	{
		$modelName = Str::studly($this->modelNameSlug);
		$modelsNamespace = config('cms.config.models_namespace') . $modelName;
		$modelRepository = new $modelsNamespace();
		$modelColumns = $modelRepository->getColumns();

		$output = [];
		$randomNumber = mt_rand(100000, 999999);
		foreach ($modelColumns as $column) {
			$fakeData = null;
			$name = $column['name'];
			$type = $column['type'];
			$form_type = $column['form_type'] ?? '';
			$database = $column['database'] ?? null;

			if ($name === 'url') {
				$fakeData = $this->modelNameSlug . '-url-' . $randomNumber;
			} elseif ($name === 'title') {
				$fakeData = $modelName . ' title ' . $randomNumber;
			} elseif ($name === 'description') {
				$fakeData = $this->faker->realText(100);
			} elseif ($name === 'content') {
				$fakeData = '<h1>h1</h1><h2>h2</h2>' . $this->faker->realText(400);
			} elseif ($name === 'canonical_url') {
				$fakeData = null;
			} elseif ($name === 'google_index') {
				$fakeData = 0;
			} elseif ($name === 'activated') {
				$fakeData = 1;
			} elseif ($form_type === 'file') {
				$file_accept = $column['file_accept'] ?? null;
				if ($file_accept === 'image/*') {
					$fileName = 'image.png';
				} elseif ($file_accept === 'video/*') {
					$fileName = 'video.mp4';
				} elseif ($file_accept === 'audio/*') {
					$fileName = 'audio.mp3';
				} else {
					$fileName = 'pdf.pdf';
				}
				$uploadFileTest = storage_path() . config('cms.config.faker_files') . $fileName;
				$fakeData = new UploadedFile($uploadFileTest, $uploadFileTest);
			} elseif ($name === 'keywords') {
				$fakeData = $this->faker->realText(100);
			} elseif ($name === 'icon') {
				$fakeData = 'fa fa-book';
			} elseif ($name === 'full_name') {
				$fakeData = $this->faker->name();
			} elseif ($name === 'phone' || $name === 'telephone') {
				$fakeData = '+49153000';
			} elseif ($name === 'national_code') {
				$fakeData = '1270739034';
			} elseif ($name === 'postal_code') {
				$fakeData = '18321';
			} elseif ($name === 'country') {
				$fakeData = $this->faker->countryCode();
			} elseif ($name === 'province') {
				$fakeData = $this->faker->state();
			} elseif ($name === 'city') {
				$fakeData = $this->faker->city();
			} elseif ($name === 'address') {
				$fakeData = $this->faker->address();
			} elseif ($name === 'latitude') {
				$fakeData = $this->faker->latitude();
			} elseif ($name === 'longitude') {
				$fakeData = $this->faker->longitude();
			} elseif ($name === 'email') {
				$fakeData = $this->faker->email();
			} elseif ($name === 'website') {
				$fakeData = $this->faker->url();
			} elseif ($name === 'language') {
				$fakeData = 'en';
			} elseif ($name === 'password') {
				$password = '1111';
				$fakeData = $password;
			} elseif ($type === 'array') {
				$random_related_count = mt_rand(2, 4);
				$fakeData = range(1, $random_related_count);
			} elseif ($database === 'none') {
				continue;
			} elseif ($type === 'text') {
				$fakeData = 'Fake ' . $this->faker->realText(400);
			} elseif ($type === 'boolean') {
				$fakeData = 0;
			} elseif (
				$type === ''
				|| $type === 'bigInteger'
				|| $type === 'integer'
				|| $type === 'tinyInteger'
				|| $type === 'unsignedBigInteger'
			) {
				$fakeData = 1;
			} elseif ($type === 'string') {
				$fakeData = 'Fake ' . $this->faker->realText(15);
			}

			$output[$name] = $fakeData;
		}
		if (isset($password)) {
			$output['password_confirmation'] = $password;
		}

		return $output;
	}
}
