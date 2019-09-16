<?php

namespace App\Enums;

use App\Base\BaseEnum;

final class FieldType extends BaseEnum
{
    const data = [
		'string' => 'string',
		'number' => 'number',
		'text' => 'text',
		'boolean' => 'boolean',
		'select' => 'select',
		'mulitselect' => 'mulitselect',
	];
}
