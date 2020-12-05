<?php

namespace App\Policies;

use App\Services\BasePolicy;

class MoviePolicy extends BasePolicy
{
	public string $modelNameSlug = 'movie';
}
