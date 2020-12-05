<?php

namespace App\Policies;

use App\Services\BasePolicy;

class TagPolicy extends BasePolicy
{
	public string $modelNameSlug = 'tag';
}
