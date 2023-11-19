<?php

declare(strict_types=1);

namespace App\Models;

use App\Cms\Models\CmsModel;

final class Like extends CmsModel
{
	public $columns = [
		[
			'name' => 'user_id',
			'type' => 'unsignedBigInteger',
			'database' => 'required',
			'relation' => 'users',
			'rule' => 'required|exists:users,id',
			'help' => '',
			'form_type' => 'entity',
			'class' => 'App\Models\User',
			'property' => 'email',
			'property_key' => 'id',
			'multiple' => false,
			'table' => true,
		],
		[
			'name' => 'type',
			'type' => 'string',
			'database' => 'required',
			'rule' => 'required',
			'help' => 'type is like or dislike.',
			'form_type' => 'enum',
			'form_enum_class' => 'LikeType',
			'table' => true,
		],
		[
			'name' => 'likeable_type',
			'type' => 'string',
			'database' => 'required',
			'rule' => 'required',
			'help' => 'This like is for which model?',
			'form_type' => 'enum',
			'form_enum_class' => 'ModelType',
			'table' => true,
		],
		[
			'name' => 'likeable_id',
			'type' => 'unsignedBigInteger',
			'database' => 'required',
			'rule' => 'required|numeric',
			'help' => '',
			'form_type' => '',
			'table' => true,
		],
	];

	protected $appends = ['user'];

	public function likeable()
	{
		return $this->morphTo();
	}
}
