<?php

namespace App\Services;

use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Image;

class FileService extends BaseService
{
    public $upload_path_prefix = 'public/files/upload/';

    public $src_path_prefix = 'storage/files/upload/';

    public function save($file, $model, $title = 'file')
    {
        $gallery = $file;
        if(! is_array($file)){
            $gallery = [$file];
        }
        foreach($gallery as $file){
            $class_name = class_basename($model);
            $model_class = 'App\\Models\\' . $class_name;
            $class_name = strtolower($class_name);
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
            if(isset($column['file_multiple']) && $column['file_multiple'] === true){
                    File::updateOrCreate($file_model_array);
            }else{
                // for single file upload this 3 columns is unique.
                File::updateOrCreate(
                    [
                        'title' => $title,
                        'fileable_id' => $fileable_id,
                        'fileable_type' => $fileable_type,
                    ],
                    $file_model_array
                );
            }
        }
    }
}
