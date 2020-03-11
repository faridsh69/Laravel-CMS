<?php

namespace App\Http\Controllers\Admin\File;

use App\Services\BaseListController;

class ResourceController extends BaseListController
{
    public $model = 'File';

    public function getRemoveBySrc()
    {
		$src = $this->request->input('src');
		$file = $this->repository->where('src', $src)->first();
		$this->destroy($file->id);

		return 'File deleted successfully';
    }
}
