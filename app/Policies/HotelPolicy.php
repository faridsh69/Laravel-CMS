<?php

namespace App\Policies;

use App\Services\BasePolicy;

class HotelPolicy extends BasePolicy
{
	public string $modelNameSlug = 'hotel';
}
