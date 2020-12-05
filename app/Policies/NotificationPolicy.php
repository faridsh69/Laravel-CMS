<?php

namespace App\Policies;

use App\Services\BasePolicy;

class NotificationPolicy extends BasePolicy
{
	public string $modelNameSlug = 'notification';
}
