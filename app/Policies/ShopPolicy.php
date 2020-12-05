<?php

namespace App\Policies;

use App\Services\BasePolicy;

class ShopPolicy extends BasePolicy
{
	public string $modelNameSlug = 'shop';
}
