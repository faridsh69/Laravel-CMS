<?php

namespace App\Policies;

use App\Services\BasePolicy;

class ShowtimePolicy extends BasePolicy
{
	public string $modelNameSlug = 'showtime';
}
