<?php

namespace App\Policies;

use App\Services\BasePolicy;

class FoodProgramPolicy extends BasePolicy
{
	public string $modelNameSlug = 'food-program';
}
