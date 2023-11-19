<?php

declare(strict_types=1);

namespace App\Models;

use App\Cms\Models\CmsModel;

final class Address extends CmsModel
{
	public $columns = [
		[
			'name' => 'full_name',
		],
		[
			'name' => 'activated',
		],
		[
			'name' => 'user_id',
		],
		[
			'name' => 'country',
		],
		[
			'name' => 'province',
		],
		[
			'name' => 'city',
		],
		[
			'name' => 'address',
		],
		[
			'name' => 'postal_code',
		],
		[
			'name' => 'phone',
		],
		[
			'name' => 'telephone',
		],
		[
			'name' => 'latitude',
		],
		[
			'name' => 'longitude',
		],
	];
}
