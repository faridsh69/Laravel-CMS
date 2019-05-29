<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;
use Str;

class Category extends Model
{
    use NodeTrait;
    use SoftDeletes;

	public $guarded = [];

	public $columns = [
        [
            'name' => 'title',
            'type' => 'string',
            'rule' => '',
            'validation' => 'required',
            'help' => '',
            'table' => true,
        ],
        [
            'name' => 'url',
            'type' => 'string',
            'rule' => 'unique',
            'validation' => 'required',
            'help' => 'Slug should be unique, contain lowercase characters and numbers and -',
            'table' => true,
        ],
        [
            'name' => 'description',
            'type' => 'string',
            'rule' => 'nullable',
            'validation' => 'nullable|max:191',
            'help' => 'Brif description about this category.',
            'form_type' => 'textarea',
            'table' => false,
        ],
        [
            'name' => 'meta_description',
            'type' => 'string',
            'rule' => 'nullable',
            'validation' => 'required|max:191|min:70',
            'help' => 'Meta description should have minimum 70 and maximum 191 characters.',
            'form_type' => 'textarea',
        ],
        [
            'name' => 'meta_image',
            'type' => 'string',
            'rule' => 'nullable',
            'validation' => 'nullable|max:191|url',
            'help' => 'Meta image shows when this page is shared in social networks.',
        ],
        [
            'name' => 'activated',
            'type' => 'boolean',
            'rule' => 'default',
        ],
        [
            'name' => 'google_index',
            'type' => 'boolean',
            'rule' => 'default',
            'help' => 'Google will index this page.',
        ],
        [
            'name' => 'canonical_url',
            'type' => 'string',
            'rule' => 'nullable',
            'validation' => 'nullable|max:191|url',
            'help' => 'Canonical url just used for seo redirect duplicate contents.',
        ],
    ];

        // Schema::create('categories', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('title');
        //     $table->string('type');
        //     $table->boolean('filter')->default(1);
        //     $table->tinyInteger('order')->nullable();
        //     $table->string('description')->nullable();
        //     $table->string('meta_title')->nullable();
        //     $table->string('meta_description')->nullable();
        //     $table->tinyInteger('status')->default(1);
        //     $table->integer('category_id')->unsigned()->nullable();
        //     $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        //     $table->integer('user_id')->unsigned()->nullable();
        //     $table->foreign('user_id')->references('id')->on('users');
        //     $table->integer('image_id')->unsigned()->nullable();
        //     $table->foreign('image_id')->references('id')->on('images')->nullable();
        //     $table->timestamps();
        //     $table->softDeletes();
        // });


    public function getColumns()
    {
        return $this->columns;
    }

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $model->url = $model->url ? $model->url : Str::kebab($model->title);
            $model->activated = $model->activated ? 1 : 0;
            $model->google_index = $model->google_index ? 1 : 0;
        });

        self::updating(function($model){
            $model->url = $model->url ? $model->url : Str::kebab($model->title);
            $model->activated = $model->activated ? 1 : 0;
            $model->google_index = $model->google_index ? 1 : 0;
        });
    }
}
