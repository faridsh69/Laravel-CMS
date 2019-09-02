<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pipe extends Model
{
    use SoftDeletes;

    public $columns = [
        [
            'name' => 'company_name',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => 'نام شرکت',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'register_number',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => 'شماره ثبت',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'economics_code',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => 'کد اقتصادی',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'activity',
            'type' => 'bigInteger',
            'database' => 'unsigned',
            'relation' => 'categories',
            'rule' => '',
            'help' => 'حوزه فعالیت',
            'form_type' => 'entity',
            'class' => 'App\Models\Category',
            'property' => 'title',
            'property_key' => 'id',
            'multiple' => false,
            'table' => false,
        ],
         [
            'name' => 'address',
            'type' => 'text',
            'database' => 'nullable',
            'rule' => '',
            'help' => 'آدرس',
            'form_type' => 'textarea',
            'table' => true,
        ],
        [
            'name' => 'phone',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable',
            'help' => 'شماره تماس',
            'form_type' => 'none',
            'table' => false,
        ],
        [
            'name' => 'resume',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => '',
            'help' => 'رزومه شخصی.',
            'form_type' => 'image',
            'table' => false,
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

    public function blocks()
    {
        return $this->hasMany('App\Models\Block', 'page_id', 'id');
    }

    public function scopeActive($query)
    {
        return $query->where('activated', 1);
    }
}
