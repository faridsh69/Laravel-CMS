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
		'upload_file' => 'Upload File',
		'upload_image' => 'Upload Image',
		'upload_video' => 'Upload Video',
		'upload_audio' => 'Upload Audio',
		'boolean' => 'Boolean',
		'select' => 'Select',
		'multiselect' => 'Multi select',
	];
}
