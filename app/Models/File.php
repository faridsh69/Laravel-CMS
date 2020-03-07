<?php

namespace App\Models;

use App\Services\BaseModel;

class File extends BaseModel
{
    // title, extension, file_name, mime_type, size, src, imageable_type, imageable_id
    public $columns = [
        ['name' => 'title'],
        [
            'name' => 'extension',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => 'extension of file',
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
            'name' => 'imageable_type',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => 'type of model image',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'imageable_id',
            'type' => 'unsignedBigInteger',
            'database' => 'nullable',
            'rule' => '',
            'help' => 'id of model image',
            'form_type' => '',
            'table' => true,
        ],
    ];

    public function imageable()
    {
        return $this->morphTo();
    }
}
