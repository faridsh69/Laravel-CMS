<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Models\Permission as PermissionSpatie;

final class Permission extends PermissionSpatie
{
	use SoftDeletes;

	public $columns = [
		[
			'name' => 'name',
			'type' => 'string',
			'database' => '',
			'rule' => 'required|max:125',
			'help' => '',
			'form_type' => '',
			'table' => true,
		],
	];

	public function getColumns()
	{
		return $this->columns;
	}

	public function saveWithRelations($data, $model = null)
	{
		if ($model) {
			$this->update($data);
		} else {
			$model = $this->create($data);
		}

		return $model;
	}
}
