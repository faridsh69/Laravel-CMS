<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Image;

class TempImageService extends BaseService
{
	public function save($file, $model, $title = null)
	{
  //       $class_name = class_basename($model);
  //       $model_class = 'App\\Models\\' . $class_name;
  //       $repository = new $model_class();
  //       $relationForGallery = $title . '_images';
		// $index = count($repository->find($model->id)->{$relationForGallery});
		// $name_file_main = 'main.jpg';
		// $name_file_thumbnail = 'thumbnail.jpg';
		// $main_name = $index . '_' . $name_file_main;
		// $thumbnail_name = $index . '_' . $name_file_thumbnail;
  //       list($width, $height) = getimagesize($file);
  //       $path_model = 'storage/' . $title . '/' . $model->id . '/';
  //       $path_storage = 'public/' . $title . '/' . $model->id;
  //       $path_intervation = storage_path('app/public/' . $title . '/' . $model->id . '/');

		// $image_model = [
  //           'title' => $title,
  //           'imageable_type' => $model_class,
  //           'imageable_id' => $model->id,
  //           'src_main' => $path_model . $main_name,
  //           'src_thumbnail' => $path_model . $thumbnail_name,
  //           'width' => $width,
  //           'height' => $height,
  //       ];
  //       $image_model = \App\Models\Image::firstOrCreate($image_model);

  //       Storage::putFileAs($path_storage, $file, $main_name);
  //       $intervation_image = Image::make($file);
  //       $intervation_image->save($path_intervation . $main_name, 100);
  //       $intervation_image->resize(300, null, function ($constraint) {
  //           $constraint->aspectRatio();
  //       });
  //       $intervation_image->save($path_intervation . $thumbnail_name, 90);
	}
}
