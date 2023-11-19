<?php

declare(strict_types=1);

namespace App\Policies;

use App\Cms\Policies\CmsPolicy;

final class RestaurantPolicy extends CmsPolicy
{
	public string $modelNameSlug = 'restaurant';
}
