<?php

declare(strict_types=1);

namespace App\Forms;

use App\Cms\Services\FormService;
use Request;
use Str;

final class Form extends FormService
{
	public function __construct()
	{
		$this->modelName = Str::studly(Request::segment(2));
		if ($this->modelName === 'Dashboard') {
			$this->modelName = 'User';
		}

		$modelNamespace = config('cms.config.models_namespace') . $this->modelName;
		$modelRepository = new $modelNamespace();
		$this->modelColumns = $modelRepository->getColumns();
	}
}
