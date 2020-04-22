<?php

namespace App\Services;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BaseMigration extends Migration
{
    // models of migration tables
    public $models;

    // model of migration table
    public $model;

    // drop and rebuild table
    public $rebuild = false;

    // create backup before rebuild
    public $backup = false;

    // seed data after rebuild
    public $seed = false;

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
                if($this->backup === true){
                    $backup_data = $repository::withTrashed()
                        ->get()
                        ->makeVisible('deleted_at')
                        ->toArray();
                    $backup_table_name = $table_name . '_backup_' . strtotime('now');
                    Schema::create($backup_table_name, function (Blueprint $table) {
                        $table->bigIncrements('id');
                        $table->text('row_data')->nullabe();
                        $table->timestamps();
                        $table->softDeletes();
                    });
                    foreach($backup_data as $backup_item){
                        \DB::table($backup_table_name)->insert([
                            'id' => $backup_item['id'],
                            'created_at' => $backup_item['created_at'],
                            'updated_at' => $backup_item['updated_at'],
                            'deleted_at' => $backup_item['deleted_at'],
                            'row_data' => serialize($backup_item),
                        ]);
                    }
                }else{
                    dump('Model records count: ' . $repository::count());
                    dump('Your data will be destroyes, You can pause the proccess with Ctrl + C, you have 5 seconds to do that!');
                    sleep(6);
                }
            }
            Schema::dropIfExists($this->table_name);
        }
        if(Schema::hasTable($table_name) === true){
            return false;
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
                    $table->{$type}($name)->{$database}();
                    $table->foreign($name)->references('id')->on($relation);
                }
                else{
                    $table->{$type}($name)->{$database}(true);
                }
            }
            // for users table need to have rememberToken
            if($table_name === 'users'){
                $table->rememberToken();
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
