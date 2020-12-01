<?php

namespace App\Policies;

use App\Services\BaseAuthPolicy;

class FollowPolicy extends BaseAuthPolicy
{
	public $modelNameSlug = 'follow';
}
