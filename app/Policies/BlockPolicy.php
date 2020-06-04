<?php

namespace App\Policies;

use App\Services\BasePolicy;

class BlockPolicy extends BasePolicy
{
	public $model_slug = 'block';
}
