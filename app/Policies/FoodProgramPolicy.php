<?php

declare(strict_types=1);

namespace App\Policies;

use App\Cms\Policies\CmsPolicy;

final class FoodProgramPolicy extends CmsPolicy
{
	public string $modelNameSlug = 'food-program';
}
