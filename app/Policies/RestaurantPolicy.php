<?php

namespace App\Policies;

use App\Services\BasePolicy;

class RestaurantPolicy extends BasePolicy
{
	public string $modelNameSlug = 'restaurant';
}
