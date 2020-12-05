<?php

namespace App\Policies;

use App\Services\BasePolicy;

class HomePolicy extends BasePolicy
{
	public string $modelNameSlug = 'home';
}
