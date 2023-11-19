<?php

declare(strict_types=1);

namespace App\Policies;

use App\Cms\Policies\CmsPolicy;

final class BlogPolicy extends CmsPolicy
{
	public string $modelNameSlug = 'blog';
}
