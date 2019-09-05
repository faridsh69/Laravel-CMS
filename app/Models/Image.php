<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use SoftDeletes;

    // title, imageable_type, imageable_id, src_main, src_thumbnail, width, height
    public $columns = [
        [
            'name' => 'title',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => 'Full name of image',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'imageable_type',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => 'type of image owner',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'imageable_id',
            'type' => 'integer',
            'database' => 'nullable',
            'rule' => '',
            'help' => 'id of image owner',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'src_main',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'src_thumbnail',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'width',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'height',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => true,
        ],
    ];

    protected $guarded = [];

    protected $hidden = [
        'deleted_at',
    ];

    public function getColumns()
    {
        return $this->columns;
    }

    public function imageable()
    {
        return $this->morphTo();
    }
}
