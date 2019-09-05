<?php

namespace App\Services;

use Image;
use Illuminate\Support\Facades\Storage;

class ImageService
{
	public function save($file, $model)
	{
		$index = count(\App\Models\Product::find($model->id)->images);
		$name_file_main = 'main.jpg';
		$name_file_thumbnail = 'thumbnail.jpg';
		$main_name = $index . '_' . $name_file_main;
		$thumbnail_name = $index . '_' . $name_file_thumbnail;
        list($width, $height) = getimagesize($file);
        $path_model = 'storage/product/' . $model->id . '/';
        $path_storage = 'public/product/' . $model->id;
        $path_intervation = storage_path('app/public/product/' . $model->id . '/');

		$image_model = [
            'title' => $file->getClientOriginalName(),
            'imageable_type' => 'App\Models\Product', 
            'imageable_id' => $model->id,
            'src_main' => $path_model . $main_name,
            'src_thumbnail' => $path_model . $thumbnail_name,
            'width' => $width, 
            'height' => $height,
        ];
        $image_model = \App\Models\Image::firstOrCreate($image_model);

        Storage::putFileAs($path_storage, $file, $main_name);
        $intervation_image = Image::make($file);
        $intervation_image->resize(450, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $intervation_image->save($path_intervation . $main_name, 90);
        $intervation_image->resize(150, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $intervation_image->save($path_intervation . $thumbnail_name, 90);
	}
}