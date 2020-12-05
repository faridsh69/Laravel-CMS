<?php

namespace App\Policies;

use App\Services\BasePolicy;

class MusicPolicy extends BasePolicy
{
	public string $modelNameSlug = 'music';
}
