<?php

namespace App\Enums;

use App\Services\BaseEnum;

final class FieldType extends BaseEnum
{
    const data = [
		'text' => 'Text',
		'textarea' => 'Textarea',
		'number' => 'Number',
		'date' => 'Date',
		'time' => 'Time',
		'email' => 'Email',
		'color' => 'Color',
		'password' => 'Password',
		'file' => 'File',
		'boolean' => 'Boolean',
		'select' => 'Select',
		'mulitselect' => 'Mulitselect',
	];
}
