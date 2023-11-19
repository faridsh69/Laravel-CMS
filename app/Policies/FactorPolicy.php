<?php

declare(strict_types=1);

namespace App\Policies;

use App\Cms\Policies\AuthPolicy;

final class FactorPolicy extends AuthPolicy
{
	public string $modelNameSlug = 'factor';
}
