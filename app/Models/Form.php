<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    // we dont need this table for version
	public function getColumns()
	{
		return [];
	}
}