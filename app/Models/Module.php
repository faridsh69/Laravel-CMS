<?php

declare(strict_types=1);

namespace App\Models;

use App\Cms\Models\CmsModel;

final class Module extends CmsModel
{
	public $columns = [
		[
			'name' => 'type',
			'type' => 'string',
			'database' => '',
			'rule' => 'required',
			'help' => 'Every Module is used in one block type.',
			'form_type' => 'enum',
			'form_enum_class' => 'BlockType',
			'table' => true,
		],
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
			'name' => 'order',
		],
		[
			'name' => 'image',
		],
		[
			'name' => 'video',
		],
		[
			'name' => 'icon',
		],
		[
			'name' => 'full_name',
		],
		[
			'name' => 'parent_id',
			'type' => 'unsignedBigInteger',
			'database' => 'nullable',
			'relation' => 'modules',
			'rule' => 'nullable',
			'help' => 'Used for menu block.',
			'form_type' => 'entity',
			'class' => 'App\Models\Module',
			'property' => 'title',
			'property_key' => 'id',
			'multiple' => false,
			'table' => false,
		],
		[
			'name' => 'product_id',
			'type' => 'unsignedBigInteger',
			'database' => 'nullable',
			'rule' => 'nullable',
			'help' => 'Used for products block.',
			'form_type' => 'entity',
			'class' => 'App\Models\Product',
			'property' => 'title',
			'property_key' => 'id',
			'multiple' => false,
			'table' => false,
		],
		[
			'name' => 'activated',
		],
		[
			'name' => 'language',
		],
	];

	public function parent()
	{
		return $this->belongsTo(self::class, 'parent_id', 'id');
	}

	public function children()
	{
		return $this->hasMany(self::class, 'parent_id', 'id');
	}

	public function product()
	{
		return $this->belongsTo(Product::class, 'product_id', 'id');
	}
}
