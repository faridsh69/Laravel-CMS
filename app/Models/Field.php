<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Field extends Model
{
    use SoftDeletes;

    // title, type, required

    // we dont need this table for version
    // Schema::create('features', function (Blueprint $table) {
    //     $table->increments('id');
    //     $table->string('title');
    //     $table->string('group')->nullable();
    //     $table->string('unit')->nullable();
    //     $table->boolean('price_affected')->default(0);
    //     $table->boolean('filter')->default(1);
    //     $table->string('type')->nullable();
    //     $table->text('options')->nullable();
    //     $table->tinyInteger('order')->nullable();
    //     $table->tinyInteger('status')->default(1);
    //     $table->integer('category_id')->unsigned()->nullable();
    //     $table->foreign('category_id')->references('id')->on('categories');
    //     $table->integer('user_id')->unsigned()->nullable();
    //     $table->foreign('user_id')->references('id')->on('users');
    //     $table->timestamps();
    //     $table->softDeletes();
    // });
    
    public $columns = [
        [
            'name' => 'title',
            'type' => 'string',
            'database' => '',
            'rule' => 'required|unique:forms,title,',
            'help' => '',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'type',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|max:191',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'required',
            'type' => 'boolean',
            'database' => 'default',
            'rule' => 'boolean',
            'help' => '',
            'form_type' => 'switch-bootstrap-m', // switch-m
            'table' => true,
        ],
        [
            'name' => 'activated',
            'type' => 'boolean',
            'database' => 'default',
            'rule' => 'boolean',
            'help' => '',
            'form_type' => '', // switch-m
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

    public function fields()
    {
        return $this->belongsToMany('App\Models\Field', 'field_form', 'form_id', 'field_id');
    }

    public function scopeActive($query)
    {
        return $query->where('activated', 1);
    }
}
