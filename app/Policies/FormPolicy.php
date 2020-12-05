<?php

namespace App\Policies;

use App\Services\BasePolicy;

class FormPolicy extends BasePolicy
{
	public string $modelNameSlug = 'form';
}
