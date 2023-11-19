<?php

declare(strict_types=1);

namespace App\Policies;

use App\Cms\Policies\CmsPolicy;

final class MoviePolicy extends CmsPolicy
{
	public string $modelNameSlug = 'movie';
}
