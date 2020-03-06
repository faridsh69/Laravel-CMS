<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Image;
use App\Models\File;

class FileUploadService extends BaseService
{
	public function save($file, $model, $title = 'file')
	{
        $class_name = class_basename($model);
        $model_class = 'App\\Models\\' . $class_name;
        $imageable_type = $model_class;
        $imageable_id = $model->id;
        $size = $file->getSize();
        $mime_type = $file->getMimeType();
        $extension = $file->getClientOriginalExtension();
        $file_name = $title . '.' . $extension;
        // save file
        $base_upload_path = 'public/files/upload/';
        $upload_path = $base_upload_path . $class_name . '/' . $imageable_id;
        $src = $upload_path . '/' . $file_name;
        Storage::putFileAs($upload_path, $file, $file_name);
        // save image model record 
        $file_model_array = [
            'title' => $title,
            'extension' => $extension,
            'file_name' => $file_name,
            'mime_type' => $mime_type,
            'size' => $size,
            'src' => $src,
            'imageable_type' => $imageable_type,
            'imageable_id' => $imageable_id,            
        ];

        $file_model = File::firstOrCreate($file_model_array);        

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
