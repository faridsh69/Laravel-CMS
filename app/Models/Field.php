<?php

declare(strict_types=1);

namespace App\Models;

use App\Cms\Models\CmsModel;

final class Field extends CmsModel
{
	public $columns = [
		[
			'name' => 'name',
			'type' => 'string',
			'database' => '',
			'rule' => 'required|max:191',
			'help' => 'Name of field.',
			'form_type' => '',
			'table' => true,
		],
		[
			'name' => 'form_type',
			'type' => 'string',
			'database' => 'nullable',
			'rule' => 'required',
			'help' => 'Select Type of fields',
			'form_type' => 'enum',
			'form_enum_class' => 'FieldType',
			'table' => true,
		],
		[
			'name' => 'rule',
			'type' => 'string',
			'database' => 'nullable',
			'rule' => 'nullable',
			'help' => 'Forexample: required|numberic|min:4',
			'form_type' => '',
			'table' => false,
		],
		[
			'name' => 'order',
		],
		[
			'name' => 'help',
			'type' => 'string',
			'database' => 'nullable',
			'rule' => '',
			'help' => 'Help text under the input',
			'form_type' => '',
			'table' => false,
		],
		[
			'name' => 'options',
			'type' => 'string',
			'database' => 'nullable',
			'rule' => 'nullable',
			'help' => 'Seperate the options with | between them',
			'form_type' => '',
			'table' => false,
		],
		[
			'name' => 'language',
		],
		[
			'name' => 'activated',
		],
	];

	public function forms()
	{
		return $this->belongsToMany(Form::class, 'field_form', 'field_id', 'form_id');
	}
}
