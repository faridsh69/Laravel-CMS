<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Image;
use App\Models\File;

class FileService extends BaseService
{
    public $upload_path_prefix = 'public/files/upload/';
    public $src_path_prefix = 'storage/files/upload/';

    public function save($file, $model, $title = 'file')
    {
        $gallery = $file;
        if(!is_array($file)){
            $gallery = [$file];
        }
        foreach($gallery as $file){
            $class_name = class_basename($model);
            $model_class = 'App\\Models\\' . $class_name;
            $fileable_type = $model_class;
            $fileable_id = $model->id;
            $size = $file->getSize();
            $mime_type = $file->getMimeType();
            $extension = $file->getClientOriginalExtension();
            $random_code = rand(10000, 99999);
            $file_name = $title . '-' . $random_code . '.' . $extension;
            // save file
            $upload_path = $this->upload_path_prefix . $class_name . '/' . $fileable_id . '/';
            $src_path = $this->src_path_prefix . $class_name . '/' . $fileable_id;
            $src = asset($src_path . '/' . $file_name);
            Storage::putFileAs($upload_path, $file, $file_name);
            // save thumbnail if its image
            $src_thumbnail = null;
            if(strpos($mime_type, 'image') === 0){
                $file_name_thumbnail = $title . '-' . $random_code . '-' . 'thumbnail' . '.' . $extension;
                $src_thumbnail = asset($src_path . '/' . $file_name_thumbnail);
                $intervation_image = Image::make($file);
                $intervation_image->resize(null, 200, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $intervation_upload_path = storage_path('app/' . $upload_path);
                $intervation_image->save($intervation_upload_path . $file_name_thumbnail, 100);
            }
            // save file model record 
            $file_model_array = [
                'title' => $title,
                'extension' => $extension,
                'file_name' => $file_name,
                'mime_type' => $mime_type,
                'size' => $size,
                'src' => $src,
                'src_thumbnail' => $src_thumbnail,
                'fileable_type' => $fileable_type,
                'fileable_id' => $fileable_id,
            ];

            $column = collect($model->getColumns())->where('name', $title)->first();
            if($column['file_multiple'] === true){
                $file_model = File::updateOrCreate($file_model_array);
            }else{
                // for single file upload this 3 columns is unique.
                $file_model = File::updateOrCreate(
                    [
                        'title' => $title, 
                        'fileable_id' => $fileable_id,
                        'fileable_type' => $fileable_type
                    ], $file_model_array);
            }
        }
    }
                
// $class_name = class_basename($model);
// $model_class = 'App\\Models\\' . $class_name;
// $repository = new $model_class();
// $relationForGallery = $title . '_images';
// $index = count($repository->find($model->id)->{$relationForGallery});
// $name_file_main = 'main.jpg';
// $name_file_thumbnail = 'thumbnail.jpg';
// $main_name = $index . '_' . $name_file_main;
// $thumbnail_name = $index . '_' . $name_file_thumbnail;
// list($width, $height) = getimagesize($file);
// $path_model = 'storage/' . $title . '/' . $model->id . '/';
// $path_storage = 'public/' . $title . '/' . $model->id;
// $path_intervation = storage_path('app/public/' . $title . '/' . $model->id . '/');

// $image_model = [
//     'title' => $title,
//     'imageable_type' => $model_class,
//     'imageable_id' => $model->id,
//     'src_main' => $path_model . $main_name,
//     'src_thumbnail' => $path_model . $thumbnail_name,
//     'width' => $width,
//     'height' => $height,
// ];
// $image_model = \App\Models\Image::firstOrCreate($image_model);

// Storage::putFileAs($path_storage, $file, $main_name);
// $intervation_image = Image::make($file);
// $intervation_image->save($path_intervation . $main_name, 100);
// $intervation_image->resize(300, null, function ($constraint) {
//     $constraint->aspectRatio();
// });
// $intervation_image->save($path_intervation . $thumbnail_name, 90);
}
