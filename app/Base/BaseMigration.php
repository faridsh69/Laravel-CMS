<?php

namespace App\Base;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BaseMigration extends Migration
{
    public $model;

    public $table_name;

    public $columns;

    public $rebuild = false;

    public function __construct()
    {
        $class_name = 'App\\Models\\' . $this->model;
        $model = new $class_name();
        $this->table_name = $model->getTable();
        $this->columns = $model->getColumns();
    }

    public function up()
    {
        $columns = $this->columns;
        $table_name = $this->table_name;
        Schema::defaultStringLength(191);
        if($this->rebuild === true){
            $model_class = 'App\\Models\\' . $this->model;
            $repository = new $model_class();
            $count = $repository::count();
            if($count > 0){
                dump('Model Count: ' . $repository::count());
                dump('Your data will be destroyes, You can pause the proccess with Ctrl + C, you have 10 seconds to do that!');
                sleep(10);
            }
            Schema::dropIfExists($this->table_name);
        }
        Schema::create($table_name, function (Blueprint $table) use ($columns, $table_name) {
            $table->bigIncrements('id');
            foreach($columns as $column){
                $name = $column['name'];
                $type = isset($column['type']) ? $column['type'] : '';
                $database = isset($column['database']) ? $column['database'] : '';
                $relation = isset($column['relation']) ? $column['relation'] : '';
                // if database attribute is 'none' it means it dont need database column
                if($database === 'none'){
                    continue;
                }
                // for create foreign key relation attribute should be defined
                elseif($relation){
                    $table->unsignedBigInteger($name);
                    $table->foreign($name)->references('id')->on($relation);
                }
                else{
                    $table->{$type}($name)->{$database}(true);
                }
            }
            // for sortable models need to add another column based on trait soratable
            if($table_name === 'categories' || $table_name === 'menus' || $table_name === 'blocks'){
                $table->nestedSet();
            }
            // for users table need to have rememberToken
            if($table_name === 'users'){
                $table->rememberToken();
            }
            // for addresses table need to have latitude, longitude
            if($table_name === 'addresses'){
                $table->decimal('latitude', 10, 8)->nullable();
                $table->decimal('longitude', 11, 8)->nullable();
            }
            // for all tables timestamps and softDelete created
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        if($this->rebuild === false){
            Schema::dropIfExists($this->table_name);
        }
    }
}
