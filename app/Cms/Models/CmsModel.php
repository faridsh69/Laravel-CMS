<?php

declare(strict_types=1);

namespace App\Cms\Models;

use App\Cms\Traits\CmsModelTrait;
use Illuminate\Database\Eloquent\Model as LaravelModel;

abstract class CmsModel extends LaravelModel
{
	use CmsModelTrait;

	protected $guarded = [];

	protected $hidden = ['deleted_at'];

	protected $casts = [
		'activated' => 'boolean',
	];

	protected $appends = ['avatar', 'main-image'];
}
