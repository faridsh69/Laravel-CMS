<?php

namespace App\Policies;

use App\Services\BasePolicy;

class BlogPolicy extends BasePolicy
{
	public string $modelNameSlug = 'blog';
}
