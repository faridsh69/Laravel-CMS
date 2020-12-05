<?php

namespace App\Policies;

use App\Services\BaseAuthPolicy;

class StoryPolicy extends BaseAuthPolicy
{
	public string $modelNameSlug = 'story';
}
