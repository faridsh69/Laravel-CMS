<?php

declare(strict_types=1);

namespace App\Policies;

use App\Cms\Policies\AuthPolicy;

final class FollowPolicy extends AuthPolicy
{
	public string $modelNameSlug = 'follow';
}
