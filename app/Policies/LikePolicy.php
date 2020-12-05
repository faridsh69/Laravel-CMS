<?php

namespace App\Policies;

use App\Services\BaseAuthPolicy;

class LikePolicy extends BaseAuthPolicy
{
	public string $modelNameSlug = 'like';
}
