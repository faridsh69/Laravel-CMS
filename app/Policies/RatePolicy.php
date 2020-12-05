<?php

namespace App\Policies;

use App\Services\BaseAuthPolicy;

class RatePolicy extends BaseAuthPolicy
{
	public string $modelNameSlug = 'rate';
}
