<?php

namespace App\Policies;

use App\Services\BasePolicy;

class TourPolicy extends BasePolicy
{
	public string $modelNameSlug = 'tour';
}
