<?php

declare(strict_types=1);

namespace App\Models;

use App\Cms\Models\CmsModel;

final class Story extends CmsModel
{
	public $columns = [
		[
			'name' => 'title',
		],
		[
			'name' => 'url',
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
}
