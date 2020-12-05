<?php

namespace App\Policies;

use App\Services\BasePolicy;

class GymProgramPolicy extends BasePolicy
{
	public string $modelNameSlug = 'gym-program';
}
