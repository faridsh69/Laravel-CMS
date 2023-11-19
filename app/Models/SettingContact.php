<?php

declare(strict_types=1);

namespace App\Models;

use App\Cms\Models\CmsModel;

final class SettingContact extends CmsModel
{
	public $columns = [
		[
			'name' => 'email',
			'type' => 'string',
			'database' => 'nullable',
			'rule' => 'email',
			'help' => '',
			'form_type' => 'email',
		],
		[
			'name' => 'phone',
			'type' => 'string',
			'database' => 'nullable',
			'rule' => 'nullable|numeric',
			'help' => 'Your mobile phone number',
			'form_type' => '',
		],
		[
			'name' => 'telephone',
			'type' => 'string',
			'database' => 'nullable',
			'rule' => 'nullable|numeric',
			'help' => 'Your office number',
			'form_type' => '',
		],
		[
			'name' => 'fax',
			'type' => 'string',
			'database' => 'nullable',
			'rule' => 'nullable|numeric',
			'help' => '',
			'form_type' => '',
		],
		[
			'name' => 'address',
			'type' => 'text',
			'database' => 'nullable',
			'rule' => '',
			'help' => '',
			'form_type' => 'textarea',
		],
		[
			'name' => 'latitude',
			'type' => 'string',
			'database' => 'nullable',
			'rule' => '',
			'help' => 'Latitude of the place you want to show on the map.',
			'form_type' => '',
		],
		[
			'name' => 'longitude',
			'type' => 'string',
			'database' => 'nullable',
			'rule' => '',
			'help' => 'Logitude of the place you want to show on the map.',
			'form_type' => '',
		],
		[
			'name' => 'whatsapp',
			'type' => 'string',
			'database' => 'nullable',
			'rule' => 'nullable|numeric',
			'help' => 'Whatsapp number',
			'form_type' => '',
		],
		[
			'name' => 'google_plus',
			'type' => 'string',
			'database' => 'nullable',
			'rule' => '',
			'help' => '',
			'form_type' => '',
		],
		[
			'name' => 'twitter',
			'type' => 'string',
			'database' => 'nullable',
			'rule' => '',
			'help' => '',
			'form_type' => '',
		],
		[
			'name' => 'facebook',
			'type' => 'string',
			'database' => 'nullable',
			'rule' => '',
			'help' => '',
			'form_type' => '',
		],
		[
			'name' => 'skype',
			'type' => 'string',
			'database' => 'nullable',
			'rule' => '',
			'help' => '',
			'form_type' => '',
		],
		[
			'name' => 'instagram',
			'type' => 'string',
			'database' => 'nullable',
			'rule' => '',
			'help' => '',
			'form_type' => '',
		],
		[
			'name' => 'telegram',
			'type' => 'string',
			'database' => 'nullable',
			'rule' => '',
			'help' => '',
			'form_type' => '',
		],
		[
			'name' => 'linkedin',
			'type' => 'string',
			'database' => 'nullable',
			'rule' => '',
			'help' => '',
			'form_type' => '',
		],
		[
			'name' => 'github',
			'type' => 'string',
			'database' => 'nullable',
			'rule' => '',
			'help' => '',
			'form_type' => '',
		],
		[
			'name' => 'stackoverflow',
			'type' => 'string',
			'database' => 'nullable',
			'rule' => '',
			'help' => '',
			'form_type' => '',
		],
	];
}
