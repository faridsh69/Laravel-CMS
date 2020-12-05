<?php

namespace App\Policies;

use App\Services\BasePolicy;

class ProductPolicy extends BasePolicy
{
	public string $modelNameSlug = 'product';
}
