<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\File;

use App\Cms\Controllers\Admin\AdminResourceController;

final class ResourceController extends AdminResourceController
{
	public string $modelNameSlug = 'file';

	public function removeBySrc()
	{
		$src = $this->httpRequest->input('src');
		$file = $this->modelRepository->where('src', $src)->first();
		$file_model_namespace = $file->fileable_type;
		$this->authorize('index', $file_model_namespace);
		$this->destroy($file->id);

		return response()->json([
			'data' => [
				'message' => __('File deleted successfully!'),
			],
		]);
	}
}
