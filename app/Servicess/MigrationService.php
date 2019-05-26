<?php

namespace App\Services;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrationService extends Migration
{
    public $model;

    public $table_name;

    public $columns;

    /**
     * Run the migrations.
     */
    public function __construct()
    {
        $class_name = 'App\\Models\\' . $this->model;
        $model = new $class_name();
        $this->table_name = $model->getTable();
        $this->columns = $model->columns;
    }

    public function up()
    {
        $columns = $this->columns;
        Schema::defaultStringLength(191);
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
        Schema::dropIfExists($this->table_name);
    }
}
