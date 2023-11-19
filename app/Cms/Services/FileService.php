<?php

declare(strict_types=1);

namespace App\Cms\Services;

use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Image;
use Str;

final class FileService
{
	private const UPLOAD_PATH_PREFIX = 'public/';

	private const DATABASE_SRC_PREFIX = 'storage';

	private const THUMBNAIL_WIDTH = 200;

	public function save($file, $model, string $title = 'file'): void
	{
		$uploadFolder = config('cms.config.upload_folder');
		// This service can upload both single and array of files
		$gallery = $file;
		if (!\is_array($file)) {
			$gallery = [$file];
		}
		foreach ($gallery as $file) {
			$modelName = class_basename($model);
			$modelNameSlug = Str::kebab($modelName);
			$fileableType = config('cms.config.models_namespace') . $modelName;
			$fileableId = $model->id;
			$size = $file->getSize();
			$mimeType = $file->getMimeType();
			$extension = $file->getClientOriginalExtension();
			$randomCode = mt_rand(1000000, 9999999);
			$fileName = $title . '-' . $randomCode . '.' . $extension;

			$uploadFolderPath = self::UPLOAD_PATH_PREFIX . $uploadFolder . $modelNameSlug . '/' . $fileableId . '/';
			$uploadFolderSrc = self::DATABASE_SRC_PREFIX . $uploadFolder . $modelNameSlug . '/' . $fileableId;
			$src = asset($uploadFolderSrc . '/' . $fileName);
			Storage::putFileAs($uploadFolderPath, $file, $fileName);

			// Save thumbnail if it is an image
			if (mb_strpos($mimeType, 'image') === 0) {
				$thumbnailFileName = $title . '-' . $randomCode . '-' . 'thumbnail' . '.' . $extension;
				$intervationImage = Image::make($file);
				$intervationImage->resize(null, self::THUMBNAIL_WIDTH, function ($constraint): void {
					$constraint->aspectRatio();
				});
				$intervationUploadPath = storage_path('app/' . $uploadFolderPath);
				$intervationImage->orientate();
				$intervationImage->save($intervationUploadPath . $thumbnailFileName, 90);
			}
			// Save file model record
			$fileModelData = [
				'fileable_type' => $fileableType,
				'fileable_id' => $fileableId,
				'title' => $title,
				'src' => $src,
				'file_name' => $fileName,
				'extension' => $extension,
				'mime_type' => $mimeType,
				'size' => $size,
			];

			$column = collect($model->getColumns())->where('name', $title)->first();
			if (isset($column['file_multiple']) && $column['file_multiple'] === true) {
				File::updateOrCreate($fileModelData);
			} else {
				// For single file upload this 3 columns is unique.
				File::updateOrCreate(
					[
						'title' => $title,
						'fileable_id' => $fileableId,
						'fileable_type' => $fileableType,
					],
					$fileModelData
				);
			}
		}
	}
}
