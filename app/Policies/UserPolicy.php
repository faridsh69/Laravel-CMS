<?php

namespace App\Policies;

use App\Services\BasePolicy;

class UserPolicy extends BasePolicy
{
	public $model_slug = 'user';
}
