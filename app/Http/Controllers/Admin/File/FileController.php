<?php

namespace App\Http\Controllers\Admin\File;

use App\Services\BaseListController;

class FileController extends BaseListController
{
	public $model = 'File';

	public function getRemoveFile()
	{
		$src = $this->request->input('src');
		$file = $this->repository->where('src', $src)->first();
		$file->delete();
	}
}
