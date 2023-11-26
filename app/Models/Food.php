<?php

declare(strict_types=1);

namespace App\Models;

use App\Cms\Models\CmsModel;

final class Food extends CmsModel
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
			'name' => 'price',
		],
		[
			'name' => 'discount_price',
		],
		[
			'name' => 'calorie',
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
			'name' => 'Bold',
			'type' => 'boolean',
			'database' => 'default',
			'rule' => 'boolean',
			'help' => 'When food is bold it will show in big box in menu.',
			'form_type' => 'checkbox-m',
			'table' => true,
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

	protected $table = 'foods';
}
