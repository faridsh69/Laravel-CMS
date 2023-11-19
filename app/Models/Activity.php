<?php

declare(strict_types=1);

namespace App\Models;

use App\Cms\Models\CmsModel;

final class Activity extends CmsModel
{
	public $columns = [
		[
			'name' => 'title',
		],
		[
			'name' => 'user_id',
		],
		[
			'name' => 'activitiable_type',
			'type' => 'string',
			'database' => 'nullable',
			'rule' => '',
			'help' => '',
			'form_type' => '',
			'table' => true,
		],
		[
			'name' => 'activitiable_id',
			'type' => 'unsignedBigInteger',
			'database' => 'nullable',
			'rule' => '',
			'help' => '',
			'form_type' => '',
			'table' => true,
		],
		[
			'name' => 'properties',
			'type' => 'text',
			'database' => 'nullable',
			'rule' => '',
			'help' => '',
			'form_type' => '',
			'table' => false,
		],
	];

	public function activitiable()
	{
		return $this->morphTo();
	}
}
