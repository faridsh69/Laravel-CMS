<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBlogsTable extends Migration
{
    public $table_name = 'blogs';
    public $columns = [
        [
            'name' => 'title', 
            'type' => 'string',
            'rule' => 'unique',
        ],
        [
            'name' => 'url', 
            'type' => 'string',
            'rule' => 'unique',
        ],
        [
            'name' => 'short_content', 
            'type' => 'string',
            'rule' => 'nullable',
        ],
        [
            'name' => 'content', 
            'type' => 'text',
        ],
        [
            'name' => 'meta_description', 
            'type' => 'string',
        ],
        [
            'name' => 'keywords', 
            'type' => 'string',
            'rule' => 'nullable',
        ],
        [
            'name' => 'meta_image', 
            'type' => 'string',
            'rule' => 'nullable',
        ],
        [
            'name' => 'published', 
            'type' => 'boolean',
            'rule' => 'default',
        ],
        [
            'name' => 'google_index', 
            'type' => 'boolean',
            'rule' => 'default',
        ],
        [
            'name' => 'canonical_url', 
            'type' => 'string',
            'rule' => 'nullable',
        ],
        [
            'name' => 'creator_id', 
            'relation' => 'users',
        ],
        [
            'name' => 'editor_id', 
            'relation' => 'users',
        ],
    ];
    /**
     * Run the migrations.
     */
    public function up()
    {
        $columns = $this->columns;
        Schema::create($this->table_name, function (Blueprint $table) use ($columns) {
            $table->bigIncrements('id');
            foreach($columns as $column){
                $name = $column['name'];
                $type = isset($column['type']) ? $column['type'] : '';
                $rule = isset($column['rule']) ? $column['rule'] : '';
                $relation = isset($column['relation']) ? $column['relation'] : '';

                if($relation){
                    $table->unsignedBigInteger($name);
                    $table->foreign($name)->references('id')->on($relation);
                }
                else{
                    $table->{$type}($name)->{$rule}(true);
                }
            }
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
