<?php

namespace App\Enums;

use App\Services\BaseEnum;

final class FieldType extends BaseEnum
{
    const data = [
		'text' => 'Text',
		'textarea' => 'Textarea',
		'number' => 'Number',
		'boolean' => 'Boolean',
		'select' => 'Select',
		'multiselect' => 'Multi select',
		'date' => 'Date',
		'time' => 'Time',
		'email' => 'Email',
		'color' => 'Color',
		'password' => 'Password',
		'captcha' => 'Captcha',
		'upload_file' => 'Upload File',
		'upload_file_multiple' => 'Upload Multiple Files',
		'upload_image' => 'Upload Image',
		'upload_image_multiple' => 'Upload Multiple Images',
		'upload_video' => 'Upload Video',
		'upload_video_multiple' => 'Upload Multiple Videos',
		'upload_audio' => 'Upload Audio',
		'upload_audio_multiple' => 'Upload Multiple Audios',
	];
}
