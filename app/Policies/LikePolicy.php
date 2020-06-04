<?php

namespace App\Policies;

use App\Services\BaseAuthPolicy;

class LikePolicy extends BaseAuthPolicy
{
	public $model_slug = 'like';
}
