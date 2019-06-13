<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;

class Menu extends Model
{
    use NodeTrait;
    use SoftDeletes;

    public $guarded = [];

    protected $hidden = [
        'deleted_at',
    ];

    //     $table->integer('order')->unsigned()->nullable();
    //     $table->tinyInteger('location')->default(1);
    //     $table->tinyInteger('status')->default(1);
    //     $table->integer('menu_id')->unsigned()->nullable();
    //     $table->foreign('menu_id')->references('id')->on('menus');


    public $columns = [
        [
            'name' => 'title',
            'type' => 'string',
            'database' => '',
            'rule' => 'required|max:60|min:10',
            'help' => 'Title should be minimum 10 and maximum 60 characters.',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'url',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'required|max:80|regex:/^[a-z0-9-]+$/',
            'help' => 'Url should be unique, contain lowercase characters and numbers and -',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'activated',
            'type' => 'boolean',
            'database' => 'default',
            'rule' => 'boolean',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
    ];

    public function getColumns()
    {
        return $this->columns;
    }
}
