<?php

declare(strict_types=1);

namespace App\Models;

use App\Cms\Models\CmsModel;

final class File extends CmsModel
{
	public $columns = [
		[
			'name' => 'fileable_type',
			'type' => 'string',
			'database' => 'nullable',
			'rule' => '',
			'help' => 'type of model that this file belongs to it.',
			'form_type' => '',
			'table' => false,
		],
		[
			'name' => 'fileable_id',
			'type' => 'unsignedBigInteger',
			'database' => 'nullable',
			'rule' => '',
			'help' => 'id of model that this file belongs to it.',
			'form_type' => '',
			'table' => false,
		],
		// Like profile-picture or cover-photo or image or videos
		// based on name of file column
		[
			'name' => 'title',
		],
		[
			'name' => 'src',
			'type' => 'string',
			'database' => 'nullable',
			'rule' => '',
			'help' => '',
			'form_type' => '',
			'table' => true,
		],
		[
			'name' => 'file_name',
			'type' => 'string',
			'database' => 'nullable',
			'rule' => '',
			'help' => 'file name',
			'form_type' => '',
			'table' => false,
		],
		[
			'name' => 'extension',
			'type' => 'string',
			'database' => 'nullable',
			'rule' => '',
			'help' => 'extension of file',
			'form_type' => '',
			'table' => false,
		],
		[
			'name' => 'mime_type',
			'type' => 'string',
			'database' => 'nullable',
			'rule' => '',
			'help' => 'mime type of file',
			'form_type' => '',
			'table' => false,
		],
		[
			'name' => 'size',
			'type' => 'unsignedBigInteger',
			'database' => 'nullable',
			'rule' => '',
			'help' => 'size of file',
			'form_type' => '',
			'table' => false,
		],
	];

	public function fileable()
	{
		return $this->morphTo();
	}
}
