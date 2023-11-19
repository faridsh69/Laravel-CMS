<?php

declare(strict_types=1);

namespace App\Models;

use App\Cms\Models\CmsModel;

final class Form extends CmsModel
{
	public $columns = [
		[
			'name' => 'title',
		],
		[
			'name' => 'description',
		],
		[
			'name' => 'activated',
		],
		[
			'name' => 'language',
		],
		[
			'name' => 'fields',
			'type' => 'array',
			'database' => 'none',
			'rule' => 'nullable',
			'help' => 'Specify the fields of form.',
			'form_type' => 'entity',
			'class' => 'App\Models\Field',
			'property' => 'name',
			'property_key' => 'id',
			'multiple' => true,
			'table' => false,
		],
		[
			'name' => 'block_id',
			'type' => 'unsignedBigInteger',
			'database' => 'nullable',
			'relation' => 'blocks',
			'rule' => 'nullable|exists:blocks,id',
			'help' => 'Select a block with form type.',
			'form_type' => 'entity',
			'class' => 'App\Models\Block',
			'property' => 'title',
			'property_key' => 'id',
			'multiple' => false,
			'table' => false,
		],
		[
			'name' => 'authentication',
			'type' => 'boolean',
			'database' => 'default',
			'rule' => 'boolean',
			'help' => 'Only authenticated users can answer this form.',
			'form_type' => 'checkbox-m',
			'table' => false,
		],
		[
			'name' => 'notification',
			'type' => 'boolean',
			'database' => 'default',
			'rule' => 'boolean',
			'help' => 'Send sms and email to admin and user.',
			'form_type' => 'checkbox-m',
			'table' => false,
		],
	];

	public function fields()
	{
		return $this->belongsToMany(Field::class, 'field_form', 'form_id', 'field_id')
			->orderBy('order', 'asc');
	}
}
