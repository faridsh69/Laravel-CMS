<?php

namespace App\Policies;

use App\Services\BaseAuthPolicy;

class AdvertisePolicy extends BaseAuthPolicy
{
	public $modelNameSlug = 'advertise';
}
