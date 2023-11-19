<?php

declare(strict_types=1);

namespace App\Models;

use App\Cms\Models\CmsModel;

final class Comment extends CmsModel
{
	public $columns = [
		[
			'name' => 'user_id',
		],
		[
			'name' => 'content',
		],
		[
			'name' => 'activated',
		],
		[
			'name' => 'image',
		],
		[
			'name' => 'video',
		],
		[
			'name' => 'commentable_type',
			'type' => 'string',
			'database' => 'nullable',
			'rule' => '',
			'help' => '',
			'form_type' => '',
			'table' => true,
		],
		[
			'name' => 'commentable_id',
			'type' => 'unsignedBigInteger',
			'database' => 'nullable',
			'rule' => '',
			'help' => '',
			'form_type' => '',
			'table' => true,
		],
	];

	public function commentable()
	{
		return $this->morphTo();
	}

	public function getAuthorAttribute()
	{
		$user = $this->user()->first();

		if ($user) {
			return $user->name;
		}

		return 'User';
	}
}
