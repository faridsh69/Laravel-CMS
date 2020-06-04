<?php

namespace App\Policies;

use App\Services\BaseAuthPolicy;

class FollowPolicy extends BaseAuthPolicy
{
	public $model_slug = 'follow';
}
