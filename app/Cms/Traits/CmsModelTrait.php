<?php

declare(strict_types=1);

namespace App\Cms\Traits;

use App\Cms\Services\DataService;
use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, belongsToMany, morphMany, morphToMany};
use Illuminate\Database\Eloquent\{Builder, Model, SoftDeletes};

trait CmsModelTrait
{
	use HasFactory;
	use SoftDeletes;

	final public function appendData(): Model
	{
		$this->images = $this->srcs('image');
		$this->videos = $this->srcs('video');
		$this->audios = $this->srcs('audio');
		$this->documents = $this->srcs('document');
		$this->likes = $this->likes;
		$this->category = $this->category;
		$this->tags = $this->tags;
		$this->relateds = $this->relateds;

		return $this;
	}

	public function getColumns(): array
	{
		$modelName = class_basename($this);
		$brifColumns = $this->columns;
		$dataService = new DataService();
		$columns = $dataService->getColumns($modelName, $brifColumns);

		return $columns;
	}

	public function scopeActive($query): Builder
	{
		return $query->where('activated', 1);
	}

	public function scopeAuthUser($query): Builder
	{
		return $query->where('user_id', Auth::id());
	}

	public function scopeLanguage($query): Builder
	{
		return $query->where('language', config('app.locale'));
	}

	public function scopeOfType($query, $type): Builder
	{
		return $query->where('type', $type);
	}

	public function user(): BelongsTo
	{
		return $this->belongsTo('App\Models\User', 'user_id', 'id');
	}

	public function category(): BelongsTo
	{
		return $this->belongsTo('App\Models\Category', 'category_id', 'id');
	}

	public function comments(): morphMany
	{
		return $this->morphMany('App\Models\Comment', 'commentable');
	}

	public function likes(): morphMany
	{
		return $this->morphMany('App\Models\Like', 'likeable');
	}

	public function rates(): morphMany
	{
		return $this->morphMany('App\Models\Rate', 'rateable');
	}

	public function activities(): morphMany
	{
		return $this->morphMany('App\Models\Activity', 'activitiable');
	}

	public function relateds(): belongsToMany
	{
		return $this->belongsToMany(
			config('cms.config.models_namespace') . class_basename($this),
			'model_related',
			'model_id',
			'related_id'
		);
	}

	public function tags(): morphToMany
	{
		return $this->morphToMany('App\Models\Tag', 'taggable');
	}

	public function files(): morphMany
	{
		return $this->morphMany('App\Models\File', 'fileable');
	}

	public function srcs(string $fileColumnName): array
	{
		return $this->files()
			->where('title', $fileColumnName)
			->get()
			->pluck('src')
			->toArray();
	}

	public function avatar($fileColumnName = 'image'): string
	{
		$srcs = $this->srcs($fileColumnName);
		if (count($srcs)) {
			return preg_replace('/(\.[^.]+)$/', sprintf('%s$1', '-thumbnail'), $srcs[0]);
		}

		return asset(config('cms.config.default_images') . mb_strtolower(class_basename($this)) . '.png');
	}

	public function mainImage($fileColumnName = 'image'): string
	{
		$srcs = $this->srcs($fileColumnName);
		if (count($srcs)) {
			return $srcs[0];
		}

		return asset(config('cms.config.default_images') . mb_strtolower(class_basename($this)) . '.png');
	}

	public function getAvatarAttribute(): string
	{
		return $this->avatar();
	}

	public function getMainImageAttribute(): string
	{
		return $this->mainImage();
	}

	public function getUserAttribute()
	{
		return $this->user()->select('id', 'url', 'first_name', 'last_name')->first();
	}

	public function saveWithRelations(array $data): Model
	{
		$isUpdating = $this->id ?? 0;
		$dataService = new DataService();
		$model = $dataService->saveWithRelations($data, $isUpdating, $this);

		return $model;
	}

	final public function getRules(): array
	{
		return collect($this->getColumns())
			->pluck('rule', 'name')
			->map(fn ($rule) => mb_strpos($rule, 'unique') !== false ? $rule . $this->id : $rule)->toArray();
	}

	public static function boot()
	{
		parent::boot();

		self::created(function ($model) {
			if (!$model->price) {
				return null;
			}

			$data = [
				'title' => $model->title,
				'price' => $model->price,
				'activated' => $model->activated,
			];
			if (env('APP_ENV') !== 'testing') {
				$model->activities()->forceCreate([
					'title' => 'Created...',
					'user_id' => Auth::id(),
					'properties' => json_encode($data)
				]);
			}
		});

		self::updating(function ($model) {
			$prevModel = $model->find($model->id);
			if (!$model || !$prevModel) return;
			$diff = array_diff_assoc($model->getAttributes(), $prevModel->getAttributes());

			if (env('APP_ENV') !== 'testing') {
				$model->activities()->forceCreate([
					'title' => 'Updating...',
					'user_id' => Auth::id(),
					'properties' => json_encode($diff)
				]);
			}
		});

		self::deleted(function ($model) {
			if (env('APP_ENV') !== 'testing') {
				$model->activities()->forceCreate([
					'title' => 'Deleted',
					'user_id' => Auth::id(),
				]);
			}
		});
	}
}
