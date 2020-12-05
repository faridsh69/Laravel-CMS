<?php

namespace App\Policies;

use App\Services\BasePolicy;

class ActivityPolicy extends BasePolicy
{
	public string $modelNameSlug = 'activity';
}
