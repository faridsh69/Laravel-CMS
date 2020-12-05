<?php

namespace App\Policies;

use App\Services\BasePolicy;

class PagePolicy extends BasePolicy
{
	public string $modelNameSlug = 'page';
}
