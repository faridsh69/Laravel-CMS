<?php

declare(strict_types=1);

namespace App\Cms\Services;

use DB;
use Illuminate\Database\Migrations\Migration as LaravelMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Str;

abstract class MigrationService extends LaravelMigration
{
	// Models of migration tables
	public array $modelNameSlugs = [];

	// For $update true, if table exist it will update, if false will rebuild
	public bool $update = true;

	// Create backup before update or rebuild
	public bool $backup = false;

	private $migrationModels = [];

	public function __construct()
	{
		if ($this->modelNameSlugs === []) {
			$this->modelNameSlugs = config('cms.migration');
		}

		foreach ($this->modelNameSlugs as $modelNameSlug) {
			$modelName = Str::studly($modelNameSlug);
			$modelNamespace = config('cms.config.models_namespace') . $modelName;
			$modelRepository = new $modelNamespace();
			$modelColumns = $modelRepository->getColumns();
			$modelTable = $modelRepository->getTable();
			$this->migrationModels[] = (object) [
				'modelRepository' => $modelRepository,
				'modelColumns' => $modelColumns,
				'modelTable' => $modelTable,
			];
		}
	}

	public function up(): void
	{
		// If you are using mariaDB you need this.
		Schema::defaultStringLength(191);
		foreach ($this->migrationModels as $migrationModel) {
			if (Schema::hasTable($migrationModel->modelTable) === false) {
				echo 'CREATING ' . $migrationModel->modelTable;
				$this->createMigration($migrationModel->modelTable, $migrationModel->modelColumns);
			} else {
				if ($this->backup === true) {
					echo 'backuping ' . $migrationModel->modelTable;
					$this->createBackupTable($migrationModel->modelTable, $migrationModel->modelRepository);
				}

				if ($this->update === true) {
					echo 'UPDATING: ';
					$this->updateMigration($migrationModel->modelTable, $migrationModel->modelColumns);
				} else {
					echo 'rebuilding ' . $migrationModel->modelTable;
					$this->dropTable($migrationModel->modelTable);
					$this->createMigration($migrationModel->modelTable, $migrationModel->modelColumns);
				}
			}
			echo " Table Done! \n";
		}
	}

	public function down(): void
	{
		$reversedmigrationModels = collect($this->migrationModels)->reverse();
		foreach ($reversedmigrationModels as $migrationModel) {
			$this->dropTable($migrationModel->modelTable);
		}
	}

	private function dropTable($modelTable): void
	{
		Schema::dropIfExists($modelTable);
	}

	private function createMigration($modelTable, $modelColumns): void
	{
		Schema::create($modelTable, function (Blueprint $table) use ($modelColumns): void {
			$table->bigIncrements('id');
			foreach ($modelColumns as $column) {
				$name = $column['name'];
				$type = $column['type'] ?? '';
				$database = $column['database'] ?? '';
				$relation = $column['relation'] ?? '';
				if ($database === 'none') {
					continue;
				}
				$table->{$type}($name)->{$database}(true);
				if ($relation) {
					$table->foreign($name)->references('id')->on($relation);
				}
			}
			$table->timestamps();
			$table->softDeletes();
		});
	}

	private function updateMigration($modelTable, $modelColumns): void
	{
		$oldDatabaseColumns = Schema::getColumnListing($modelTable);
		$extraColumns = ['id', 'created_at', 'updated_at', 'deleted_at'];
		$dropColumns = $oldDatabaseColumns;
		$addColumns = collect($modelColumns)->where('database', '!=', 'none')->toArray();
		foreach ($oldDatabaseColumns as $columnKey => $oldDatabaseColumn) {
			$arrayIndex = array_search($oldDatabaseColumn, collect($modelColumns)->pluck('name')->toArray(), true);
			if ($arrayIndex !== false) {
				unset($dropColumns[$columnKey], $addColumns[$arrayIndex]);
			}
			if (array_search($oldDatabaseColumn, $extraColumns, true) !== false) {
				unset($dropColumns[$columnKey]);
			}
		}
		echo ' droping ' . \count($dropColumns) . ' columns. ';
		echo 'adding ' . \count($addColumns) . ' columns.';
		echo ' IN ' . $modelTable;
		Schema::table($modelTable, function (Blueprint $table) use ($addColumns, $dropColumns): void {
			foreach ($dropColumns as $dropColumn) {
				if (mb_strpos($dropColumn, '_id') !== false) {
					$table->dropForeign([$dropColumn]);
				}
				$table->dropColumn($dropColumn);
			}
			foreach ($addColumns as $column) {
				$name = $column['name'];
				$type = $column['type'];
				$database = $column['database'] ?? '';
				$relation = $column['relation'] ?? '';
				if ($database === 'none') {
					continue;
				}
				$table->{$type}($name)->{$database}(true)->after('id');
				if ($relation) {
					$table->foreign($name)->references('id')->on($relation);
				}
			}
		});
	}

	private function createBackupTable($modelTable, $modelRepository): void
	{
		$modelRepositoryList = $modelRepository->withTrashed()
			->get()
			->makeVisible('deleted_at')
			->toArray();
		$backupTableName = $modelTable . '_backup_' . strtotime('now');
		Schema::create($backupTableName, function (Blueprint $table): void {
			$table->bigIncrements('id');
			$table->text('row_data')->nullabe();
			$table->timestamps();
			$table->softDeletes();
		});
		foreach ($modelRepositoryList as $modelRepositoryItem) {
			DB::table($backupTableName)->insert([
				'id' => $modelRepositoryItem['id'],
				'created_at' => $modelRepositoryItem['created_at'],
				'updated_at' => $modelRepositoryItem['updated_at'],
				'deleted_at' => $modelRepositoryItem['deleted_at'],
				'row_data' => serialize($modelRepositoryItem),
			]);
		}
	}
}
