<?php

declare(strict_types=1);

namespace App\Models;

use App\Cms\Models\CmsModel;

final class Travel extends CmsModel
{
	public $columns = [
		[
			'name' => 'title',
		],
		[
			'name' => 'url',
		],
		[
			'name' => 'description',
		],
		[
			'name' => 'origin',
		],
		[
			'name' => 'destination',
		],
		[
			'name' => 'date',
		],
		[
			'name' => 'time',
		],
		[
			'name' => 'price',
		],
		[
			'name' => 'discount_price',
		],
		[
			'name' => 'properties',
		],
		[
			'name' => 'content',
		],
		[
			'name' => 'image',
		],
		[
			'name' => 'video',
		],
		[
			'name' => 'activated',
		],
		[
			'name' => 'category_id',
		],
		[
			'name' => 'tags',
		],
		[
			'name' => 'relateds',
		],
		[
			'name' => 'language',
		],
	];

	protected $table = 'travels';
}
