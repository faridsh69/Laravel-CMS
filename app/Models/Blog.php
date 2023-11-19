<?php

declare(strict_types=1);

namespace App\Models;

use App\Cms\Models\CmsModel;

final class Blog extends CmsModel
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
			'name' => 'content',
		],
		[
			'name' => 'image',
		],
		[
			'name' => 'video',
		],
		[
			'name' => 'audio',
		],
		[
			'name' => 'document',
		],
		[
			'name' => 'activated',
		],
		[
			'name' => 'google_index',
		],
		[
			'name' => 'canonical_url',
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
