<?php

namespace App\Policies;

use App\Services\BasePolicy;

class FilePolicy extends BasePolicy
{
	public string $modelNameSlug = 'file';
}
