<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use BaseModelTrait;

	protected $guarded = [];

	protected $hidden = [
		'deleted_at',
	];
}
