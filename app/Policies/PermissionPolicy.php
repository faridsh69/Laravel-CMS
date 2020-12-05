<?php

namespace App\Policies;

use App\Services\BasePolicy;

class PermissionPolicy extends BasePolicy
{
	public string $modelNameSlug = 'permission';
}
