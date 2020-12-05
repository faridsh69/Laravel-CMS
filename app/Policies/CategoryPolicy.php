<?php

namespace App\Policies;

use App\Services\BasePolicy;

class CategoryPolicy extends BasePolicy
{
	public string $modelNameSlug = 'category';
}
