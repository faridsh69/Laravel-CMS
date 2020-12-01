<?php

namespace App\Services;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Str;

class BaseMigration extends Migration
{
    // models of migration tables
    public $modelNameSlugs = [];

    // model of migration table
    public $modelNameSlug;

    // if table exist it will update or rebuild
    public $update = true;

    // create backup before update or rebuild
    public $backup = false;

    private $_migrations = [];

    public function __construct()
    {
        if ($this->modelNameSlugs === []){
            $this->modelNameSlugs = [$this->modelNameSlug];
            if ($this->modelNameSlug === null){
                $this->modelNameSlugs = config('cms.migration');
            }
        }
        foreach($this->modelNameSlugs as $modelNameSlug){
            $modelName = Str::studly($modelNameSlug);
            $modelNamespace = config('cms.config.models_namespace') . $modelName;
            $modelRepository = new $modelNamespace();
            $modelColumns = $modelRepository->getColumns();
            $model_table = $modelRepository->getTable();
            $this->_migrations[] = (object) [
                'model_slug' => $modelNameSlug,
                'model_name' => $modelName,
                'model_namespace' => $modelNamespace,
                'model_repository' => $modelRepository,
                'model_columns' => $modelColumns,
                'model_table' => $model_table,
            ];
        }
    }

    public function up()
    {
        Schema::defaultStringLength(191); // if you are using mariaDB you need this.
        foreach($this->_migrations as $_migration)
        {
            if(Schema::hasTable($_migration->model_table) === false){
                echo 'creating ' . $_migration->model_table;
                $this->_createMigration($_migration->model_table, $_migration->model_columns);
            }else{
                if($this->backup === true){
                    echo 'backuping ' . $_migration->model_table;
                    $this->_createBackupTable($_migration->model_table, $_migration->model_repository);
                }
                if($this->update === true){
                    echo 'updating ' . $_migration->model_table;
                    $this->_updateMigration($_migration->model_table, $_migration->model_columns);
                }else{
                    echo 'rebuilding ' . $_migration->model_table;
                    $this->_dropTable($_migration->model_table);
                    $this->_createMigration($_migration->model_table, $_migration->model_columns);
                }
            }
            echo "\n";
        }
    }

    public function down()
    {
        $reversed_migrations = collect($this->_migrations)->reverse();
        foreach($reversed_migrations as $_migration)
        {
            $this->_dropTable($_migration->model_table);
        }
    }

    private function _dropTable($model_table)
    {
        Schema::dropIfExists($model_table);
    }

    private function _createMigration($model_table, $modelColumns)
    {
        Schema::create($model_table, function (Blueprint $table) use ($modelColumns) {
            $table->bigIncrements('id');
            foreach($modelColumns as $column){
                $name = $column['name'];
                $type = isset($column['type']) ? $column['type'] : '';
                $database = isset($column['database']) ? $column['database'] : '';
                $relation = isset($column['relation']) ? $column['relation'] : '';
                if($database === 'none'){
                    continue;
                }
                $table->{$type}($name)->{$database}(true);
                if($relation){
                    $table->foreign($name)->references('id')->on($relation);
                }
            }
            $table->timestamps();
            $table->softDeletes();
        });
    }

    private function _updateMigration($model_table, $modelColumns)
    {
        $old_database_columns = Schema::getColumnListing($model_table);
        $extra_columns = ['id', 'created_at', 'updated_at', 'deleted_at'];
        $drop_columns = $old_database_columns;
        $add_columns = collect($modelColumns)->where('database', '!=', 'none')->toArray();
        foreach($old_database_columns as $column_key => $old_database_column){
            $array_index = array_search($old_database_column, collect($modelColumns)->pluck('name')->toArray(), true);
            if($array_index !== false){
                unset($drop_columns[$column_key]);
                unset($add_columns[$array_index]);
            }
            if(array_search($old_database_column, $extra_columns, true) !== false){
                unset($drop_columns[$column_key]);
            }
        }
        echo ' droping ' . count($drop_columns) . ' columns. ';
        echo 'adding ' . count($add_columns) . ' columns.';
        Schema::table($model_table, function (Blueprint $table) use ($add_columns, $drop_columns) {
            foreach($drop_columns as $drop_column){
                if(strpos($drop_column, '_id') !== false){
                    $table->dropForeign([$drop_column]);
                }
                $table->dropColumn($drop_column);
            }
            foreach($add_columns as $column){
                $name = $column['name'];
                $type = $column['type'];
                $database = isset($column['database']) ? $column['database'] : '';
                $relation = isset($column['relation']) ? $column['relation'] : '';
                if($database === 'none'){
                    continue;
                }
                $table->{$type}($name)->{$database}(true)->after('id');
                if($relation){
                    $table->foreign($name)->references('id')->on($relation);
                }
            }
        });
    }

    private function _createBackupTable($model_table, $modelRepository)
    {
        $modelRepository_list = $modelRepository->withTrashed()
            ->get()
            ->makeVisible('deleted_at')
            ->toArray();
        $backup_table_name = $model_table . '_backup_' . strtotime('now');
        Schema::create($backup_table_name, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('row_data')->nullabe();
            $table->timestamps();
            $table->softDeletes();
        });
        foreach($modelRepository_list as $modelRepository_item){
            \DB::table($backup_table_name)->insert([
                'id' => $modelRepository_item['id'],
                'created_at' => $modelRepository_item['created_at'],
                'updated_at' => $modelRepository_item['updated_at'],
                'deleted_at' => $modelRepository_item['deleted_at'],
                'row_data' => serialize($modelRepository_item),
            ]);
        }
    }
}
