<?php

namespace App\Services;

use Auth;
use Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseModel extends Model
{
	use SoftDeletes;

	protected $guarded = [];

	protected $hidden = [
		'deleted_at',
	];

	public function scopeActive($query)
	{
		return $query->where('activated', 1);
	}

	public function scopeAuthUser($query)
	{
		return $query->where('user_id', Auth::id());
	}

	public function scopeLanguage($query)
	{
		return $query->where('language', config('app.locale'));
	}

	public function scopeOfType($query, $type)
	{
		return $query->where('type', $type);
	}

	public function user()
	{
		return $this->belongsTo('App\Models\User', 'user_id', 'id');
	}

	public function category()
	{
		return $this->belongsTo('App\Models\Category', 'category_id', 'id');
	}

	public function tags()
	{
		return $this->morphToMany('App\Models\Tag', 'taggable');
	}

	public function comments()
	{
		return $this->morphMany('App\Models\Comment', 'commentable');
	}

	public function likes()
	{
		return $this->morphMany('App\Models\Like', 'likeable');
	}

	public function rates()
	{
		return $this->morphMany('App\Models\Rate', 'rateable');
	}

	public function follows()
	{
		return $this->morphMany('App\Models\Rate', 'rateable');
	}

	public function activities()
	{
		return $this->morphMany('App\Models\Activity', 'activitiable');
	}

	public function relateds()
	{
		return $this->belongsToMany(config('cms.config.models_namespace') . class_basename($this), 'model_related', 'model_id', 'related_id');
	}

	public function files()
	{
		return $this->morphMany('App\Models\File', 'fileable');
	}

	public function files_for($title)
	{
		return $this->files()->where('title', $title)->get();
	}

	public function files_src_for($title)
	{
		return $this->files_for($title)->pluck('src')->toArray();
	}

	public function file_src_for($title)
	{
		if($this->files_for($title)->first()){
			return $this->files_for($title)->first()->src;
		}

		return config('setting-general.default_meta_image');
	}

	public function srcs($title)
	{
		$isFileManager = collect($this->getColumns())->where('name', $title)->first()['file_manager'];
		$srcs = [];
		if($isFileManager === true && $this->{$title}){
			$srcs = explode(',', $this->{$title});
		}
		else {
			$srcs = $this->files_src_for($title);
		}

		return $srcs;
	}

	public function src($title)
	{
		$srcs = $this->srcs($title);
		return count($srcs) > 0 ? $srcs[0] : config('setting-general.default_meta_image');
	}

	public function image_default()
	{
		if(isset($this->image) && $this->image) {
			return $this->image;
		}

		return config('setting-general.default_meta_image');
	}

	public function saveWithRelations($data, $model = null)
	{
		$data_without_file_and_array = $this->clearFilesAndArrays($data);
		if($model){
			$model->update($data_without_file_and_array);
		}else{
			$model = $this->create($data_without_file_and_array);
		}
		$this->saveRelatedDataAfterCreate($data, $model);

		return $model;
	}

	public function getColumns()
	{
		$constructor = [
			'model_name' => class_basename($this),
			'model_namespace' => (new \ReflectionClass($this))->getName(),
			'table_name' => $this->getTable(),
		];

		$seconds = 1;
		return Cache::remember('model' . $constructor['model_name'], $seconds, function () use($constructor) {
			$default_columns = [
				'title' => [
					'name' => 'title',
					'type' => 'string',
					'database' => '',
					'rule' => 'required|min:' . config('setting-developer.seo_title_min')
					. '|max:' . config('setting-developer.seo_title_max'),
					'help' => 'Title should be unique.',
					'form_type' => '',
					'table' => true,
				],
				'description' => [
					'name' => 'description',
					'type' => 'text',
					'database' => 'nullable',
					'rule' => 'nullable',
					'help' => 'Description should be 50 - 70 characters, maximum 160 characters.',
					'form_type' => 'textarea',
					'table' => true,
				],
				'content' => [
					'name' => 'content',
					'type' => 'text',
					'database' => 'nullable',
					'rule' => 'nullable', // only page and blog need seo_header
					'help' => '',
					'form_type' => 'ckeditor',
					'table' => false,
				],
				'url' => [
					'name' => 'url',
					'type' => 'string',
					'database' => 'nullable',
					// 'rule' => 'required|unique:'. $constructor['table_name']. ',url,',
					'rule' => 'nullable|max:' . config('setting-developer.seo_url_max'),
					'help' => 'Url should be unique, contain [a-z, 0-9, -], required for seo',
					'form_type' => '',
					'table' => false,
				],
				'keywords' => [
					'name' => 'keywords',
					'type' => 'string',
					'database' => 'nullable',
					'rule' => 'nullable|max:191',
					'help' => 'Keywords is optional and is not important for google',
					'form_type' => '',
					'table' => false,
				],
				'activated' => [
					'name' => 'activated',
					'type' => 'boolean',
					'database' => 'default',
					'rule' => 'boolean',
					'help' => '',
					'form_type' => 'switch-m', // switch-m, checkbox, switch-bootstrap-m
					'table' => false,
				],
				'google_index' => [
					'name' => 'google_index',
					'type' => 'boolean',
					'database' => 'default',
					'rule' => 'boolean',
					'help' => 'Shows google robots will follow this link.',
					'form_type' => 'checkbox-m',
					'table' => false,
				],
				'canonical_url' => [
					'name' => 'canonical_url',
					'type' => 'string',
					'database' => 'nullable',
					'rule' => 'nullable|max:191',
					'help' => 'Canonical url is neccessary if one content will show from two different urls.',
					'form_type' => '',
					'table' => false,
				],
				'icon' => [
					'name' => 'icon',
					'type' => 'string',
					'database' => 'nullable',
					'rule' => '',
					'help' => 'Click: <a target="blank" href="/admin/icons/list">List of Icons</a> - for example: fa-glass',
					'form_type' => '',
					'table' => false,
				],
				'full_name' => [
					'name' => 'full_name',
					'type' => 'string',
					'database' => 'nullable',
					'rule' => '',
					'help' => '',
					'form_type' => '',
					'table' => false,
				],
				'user_id' => [
					'name' => 'user_id',
					'type' => 'unsignedBigInteger',
					'database' => 'nullable',
					'relation' => 'users',
					'rule' => 'nullable|exists:users,id',
					'help' => '',
					'form_type' => 'entity',
					'class' => 'App\Models\User',
					'property' => 'email',
					'property_key' => 'id',
					'multiple' => false,
					'table' => true,
				],
				'category_id' => [
					'name' => 'category_id',
					'type' => 'unsignedBigInteger',
					'database' => 'nullable',
					'relation' => 'categories',
					'rule' => 'nullable|exists:categories,id',
					'help' => '',
					'form_type' => 'entity',
					'class' => 'App\Models\Category',
					'property' => 'title',
					'property_key' => 'id',
					'query_builder' => 'type|' . $constructor['model_name'],
					'multiple' => false,
					'table' => true,
				],
				'tags' => [
					'name' => 'tags',
					'type' => 'array',
					'database' => 'none',
					'rule' => 'nullable',
					'help' => '',
					'form_type' => 'entity',
					'class' => 'App\Models\Tag',
					'property' => 'title',
					'property_key' => 'id',
					'query_builder' => 'type|' . $constructor['model_name'],
					'multiple' => true,
					'table' => false,
				],
				'relateds' => [
					'name' => 'relateds',
					'type' => 'array',
					'database' => 'none',
					'rule' => 'nullable',
					'help' => 'Select related items to suggest to user.',
					'form_type' => 'entity',
					'class' => $constructor['model_namespace'],
					'property' => 'title',
					'property_key' => 'id',
					'multiple' => true,
					'table' => false,
				],
				'language' => [
					'name' => 'language',
					'type' => 'string',
					'database' => 'nullable',
					'rule' => '',
					'help' => 'Specify language.',
					'form_type' => 'enum',
					'form_enum_class' => 'AppLanguage',
					'table' => false,
				],
				'order' => [
					'name' => 'order',
					'type' => 'integer',
					'database' => 'nullable',
					'rule' => 'nullable|numeric',
					'help' => 'Sort by this column, lower order will be ahead',
					'form_type' => '',
					'table' => true,
				],
				'admin_files' => [
					'name' => 'admin_files',
					'type' => 'text',
					'database' => 'nullable',
					'rule' => 'nullable',
					'help' => 'Upload and select file from file manager',
					'form_type' => 'file',
					'file_manager' => true, // its uploaded from file manager
					'file_accept' => 'file', // file, image, video, audio
					'file_multiple' => true,
					'table' => false,
				],
				// Images that used file manager to select and upload.
				'admin_filemanager_images' => [
					'name' => 'admin_filemanager_images',
					'type' => 'text',
					'database' => 'nullable',
					'rule' => 'nullable',
					'help' => 'Upload and select image from file manager',
					'form_type' => 'file',
					'file_manager' => true,
					'file_accept' => 'image',
					'file_multiple' => true,
					'table' => true,
				],
				'admin_videos' => [
					'name' => 'admin_videos',
					'type' => 'text',
					'database' => 'nullable',
					'rule' => 'nullable',
					'help' => 'Upload and select video from file manager',
					'form_type' => 'file',
					'file_manager' => true,
					'file_accept' => 'video',
					'file_multiple' => true,
					'table' => false,
				],
				'admin_audios' => [
					'name' => 'admin_audios',
					'type' => 'text',
					'database' => 'nullable',
					'rule' => 'nullable',
					'help' => 'Upload and select audio from file manager',
					'form_type' => 'file',
					'file_manager' => true,
					'file_accept' => 'audio',
					'file_multiple' => true,
					'table' => false,
				],
				'user_files' => [
					'name' => 'user_files',
					'type' => 'file',
					'database' => 'none',
					'rule' => 'nullable',
					'help' => '',
					'form_type' => 'file',
					'file_manager' => false,
					'file_accept' => 'file',
					'file_multiple' => true,
					'table' => false,
				],
				// Images that is using file upload for end user.
				'user_upload_images' => [
					'name' => 'user_images',
					'type' => 'file',
					'database' => 'none',
					'rule' => 'nullable',
					'help' => '',
					'form_type' => 'file',
					'file_manager' => false,
					'file_accept' => 'image',
					'file_multiple' => true,
					'table' => false,
				],
				'user_videos' => [
					'name' => 'user_videos',
					'type' => 'file',
					'database' => 'none',
					'rule' => 'nullable',
					'help' => '',
					'form_type' => 'file',
					'file_manager' => false,
					'file_accept' => 'video',
					'file_multiple' => true,
					'table' => false,
				],
				'user_audios' => [
					'name' => 'user_audios',
					'type' => 'file',
					'database' => 'none',
					'rule' => 'nullable',
					'help' => '',
					'form_type' => 'file',
					'file_manager' => false,
					'file_accept' => 'audio',
					'file_multiple' => true,
					'table' => false,
				],
				'opening_hours' => [
					'name' => 'opening_hours',
					'type' => 'string',
					'database' => 'nullable',
					'rule' => 'nullable|max:191',
					'help' => '',
					'form_type' => '',
					'table' => false,
				],
				'city' => [
					'name' => 'city',
					'type' => 'string',
					'database' => 'nullable',
					'rule' => 'nullable|max:191',
					'help' => '',
					'form_type' => '',
					'table' => false,
				],
				'country' => [
					'name' => 'country',
					'type' => 'string',
					'database' => 'nullable',
					'rule' => '',
					'help' => '',
					'form_type' => '',
					'table' => false,
				],
				'province' => [
					'name' => 'province',
					'type' => 'string',
					'database' => 'nullable',
					'rule' => '',
					'help' => '',
					'form_type' => '',
					'table' => false,
				],
				'city' => [
					'name' => 'city',
					'type' => 'string',
					'database' => 'nullable',
					'rule' => '',
					'help' => '',
					'form_type' => '',
					'table' => true,
				],
				'address' => [
					'name' => 'address',
					'type' => 'text',
					'database' => 'nullable',
					'rule' => '',
					'help' => '',
					'form_type' => 'textarea',
					'table' => true,
				],
				'postal_code' => [
					'name' => 'postal_code',
					'type' => 'string',
					'database' => 'nullable',
					'rule' => '',
					'help' => '',
					'form_type' => '',
					'table' => false,
				],
				'phone' => [
					'name' => 'phone',
					'type' => 'string',
					'database' => 'nullable',
					'rule' => 'nullable|max:30',
					'help' => 'Mobile Number',
					'form_type' => '',
					'table' => false,
				],
				'telephone' => [
					'name' => 'telephone',
					'type' => 'string',
					'database' => 'nullable',
					'rule' => 'nullable|max:30',
					'help' => 'Home Number',
					'form_type' => '',
					'table' => false,
				],
				'latitude' => [
					'name' => 'latitude',
					'type' => 'decimal',
					'database' => 'nullable',
					'rule' => '',
					'help' => '',
					'form_type' => '',
					'table' => false,
				],
				'longitude' => [
					'name' => 'longitude',
					'type' => 'decimal',
					'database' => 'nullable',
					'rule' => '',
					'help' => '',
					'form_type' => '',
					'table' => false,
				],
				'properties' => [
					'name' => 'properties',
					'type' => 'text',
					'database' => 'nullable',
					'rule' => '',
					'help' => '',
					'form_type' => 'textarea',
					'table' => false,
				],
				'website' => [
					'name' => 'website',
					'type' => 'string',
					'database' => 'nullable',
					'rule' => 'nullable',
					'help' => '',
					'form_type' => '',
					'table' => false,
				],
				'email' => [
					'name' => 'email',
					'type' => 'string',
					'database' => 'nullable',
					'rule' => 'nullable|email',
					'help' => 'Wrtie valid email address',
					'form_type' => '',
					'table' => false,
				],
				'price' => [
					'name' => 'price',
					'type' => 'bigInteger',
					'database' => 'nullable',
					'rule' => 'nullable|numeric',
					'help' => '',
					'form_type' => 'number',
					'table' => true,
				],
				'discount_price' => [
					'name' => 'discount_price',
					'type' => 'bigInteger',
					'database' => 'nullable',
					'rule' => 'nullable|numeric',
					'help' => '',
					'form_type' => 'number',
					'table' => false,
				],
				'year' => [
					'name' => 'year',
					'type' => 'integer',
					'database' => 'nullable',
					'rule' => 'nullable|numeric',
					'help' => '',
					'form_type' => 'number',
					'table' => false,
				],
				'rooms' => [
					'name' => 'rooms',
					'type' => 'integer',
					'database' => 'nullable',
					'rule' => 'nullable|numeric',
					'help' => '',
					'form_type' => 'number',
					'table' => true,
				],
				'color' => [
					'name' => 'color',
					'type' => 'string',
					'database' => 'nullable',
					'rule' => '',
					'help' => '',
					'form_type' => '',
					'table' => false,
				],
				'foundation' => [
					'name' => 'foundation',
					'type' => 'string',
					'database' => 'nullable',
					'rule' => '',
					'help' => '',
					'form_type' => '',
					'table' => true,
				],
				'calorie' => [
					'name' => 'calorie',
					'type' => 'integer',
					'database' => 'nullable',
					'rule' => 'nullable|numeric',
					'help' => '',
					'form_type' => '',
					'table' => true,
				],
				'singer' => [
					'name' => 'singer',
					'type' => 'string',
					'database' => 'nullable',
					'rule' => '',
					'help' => '',
					'form_type' => '',
					'table' => true,
				],
				'director' => [
					'name' => 'director',
					'type' => 'string',
					'database' => 'nullable',
					'rule' => '',
					'help' => '',
					'form_type' => '',
					'table' => true,
				],
				'date' => [
					'name' => 'date',
					'type' => 'string',
					'database' => 'nullable',
					'rule' => '',
					'help' => '',
					'form_type' => 'date',
					'table' => true,
				],
				'time' => [
					'name' => 'time',
					'type' => 'string',
					'database' => 'nullable',
					'rule' => '',
					'help' => '',
					'form_type' => 'time',
					'table' => true,
				],
				'destination' => [
					'name' => 'destination',
					'type' => 'string',
					'database' => 'nullable',
					'rule' => '',
					'help' => '',
					'form_type' => '',
					'table' => true,
				],
				'origin' => [
					'name' => 'origin',
					'type' => 'string',
					'database' => 'nullable',
					'rule' => '',
					'help' => '',
					'form_type' => '',
					'table' => true,
				],
			];

			$columns = $this->columns;
			foreach($columns as $key => $column)
			{
				if (isset($column['same_column_name']))
				{
					$columns[$key] = $default_columns[$column['same_column_name']];
					$columns[$key]['name'] = $column['name'];
				}
				else if (array_key_exists($column['name'], $default_columns) && !isset($column['type']))
				{
					// check if column is not user defined in model then use default column
					$columns[$key] = $default_columns[$column['name']];
				}
				else
				{
					if (!isset($column['type']))
					{
						$columns[$key]['type'] = 'text';
						$columns[$key]['database'] = 'nullable';
						$columns[$key]['rule'] = '';
						$columns[$key]['help'] = '';
						$columns[$key]['form_type'] = '';
						$columns[$key]['table'] = false;
					}
				}
			}

			return $columns;
		});
	}

	private function clearFilesAndArrays($data)
	{
		// convert boolean input values: null and false => 0, true => 1
		foreach(collect($this->getColumns())->where('type', 'boolean')->pluck('name') as $boolean_column)
		{
			if(! isset($data[$boolean_column]))
			{
				$data[$boolean_column] = 0;
			}
		}
		// unset file and array attributes before saving
		foreach(collect($this->getColumns())->whereIn('type', ['file', 'array', 'captcha'])->pluck('name') as $file_or_array_column)
		{
			unset($data[$file_or_array_column]);
		}

		return $data;
	}

	private function saveRelatedDataAfterCreate($data, $model)
	{
		// files column
		foreach(collect($this->getColumns())->where('type', 'file')->pluck('name') as $file_column) {
			if(isset($data[$file_column]) && $data[$file_column]){
				$file = $data[$file_column];
				$file_service = new \App\Services\BaseFileService();
				$file_service->save($file, $model, $file_column);
			}
		}
		// save relations with array type column like tags, related_models, ...
		foreach(collect($this->getColumns())->where('type', 'array')->pluck('name') as $array_column) {
			$model->{$array_column}()->sync($data[$array_column], true);
		}
	}

		// $files = $this->files($title);
		// if($files->count() > 1){
		//     return $files->pluck('src')->implode('|||');
		// }elseif($files->count() === 1){
		//     return $files->first()->src;
		// }

		// return null;

		// $file_src = $this->model->file_src($name);
		// $file_src = explode('|||', $file_src);
		// if($file_src === ['']){
		//     $file_src = [];
		// }
		// $options['value'] = json_encode($file_src);

	// public function file_src_thumbnail($title)
	// {
	//     $file = $this->file($title);
	//     if($file){
	//         return $file->src_thumbnail;
	//     }
	//     return null;
	// }

	// public function getAssetImageAttribute()
	// {
	//     if(isset($this->image) && $this->image) {
	//         return asset($this->image);
	//     }

	//     return asset(config('setting-general.default_meta_image'));
	// }

	// protected $appends = ['file_upload', 'image_upload', 'video_upload', 'audio_upload', 'text_upload'];

	// public function getFileUploadAttribute(){
	//     $file = $this->files()->where('title', 'file_upload')->first();
	//     if($file){
	//         return $file->src;
	//     }
	//     return null;
	// }

	// public function getFileUploadOrDefaultAttribute(){
	//     $file_upload = $this->file_upload;
	//     if($file_upload){
	//         return $file_upload;
	//     }
	//     return asset(config('setting-general.default_user_image'));
	// }
}
