<?php

namespace App\Policies;

use App\Services\BasePolicy;

class CinemaPolicy extends BasePolicy
{
	public string $modelNameSlug = 'cinema';
}
