<?php

declare(strict_types=1);

namespace App\Models;

use App\Cms\Models\CmsModel;

final class Follow extends CmsModel
{
	public $columns = [
		[
			'name' => 'user_id',
		],
		[
			'name' => 'followable_type',
			'type' => 'string',
			'database' => 'nullable',
			'rule' => '',
			'help' => '',
			'form_type' => '',
			'table' => true,
		],
		[
			'name' => 'followable_id',
			'type' => 'unsignedBigInteger',
			'database' => 'nullable',
			'rule' => '',
			'help' => '',
			'form_type' => '',
			'table' => true,
		],
	];

	public function followable()
	{
		return $this->morphTo();
	}
}
