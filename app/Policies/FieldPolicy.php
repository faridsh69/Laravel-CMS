<?php

namespace App\Policies;

use App\Services\BasePolicy;

class FieldPolicy extends BasePolicy
{
	public string $modelNameSlug = 'field';
}
