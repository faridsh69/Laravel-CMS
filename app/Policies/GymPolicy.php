<?php

namespace App\Policies;

use App\Services\BasePolicy;

class GymPolicy extends BasePolicy
{
	public string $modelNameSlug = 'gym';
}
