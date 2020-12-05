<?php

namespace App\Policies;

use App\Services\BasePolicy;

class GymActionPolicy extends BasePolicy
{
	public string $modelNameSlug = 'gym-action';
}
