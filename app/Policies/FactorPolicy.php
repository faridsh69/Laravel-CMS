<?php

namespace App\Policies;

use App\Services\BaseAuthPolicy;

class FactorPolicy extends BaseAuthPolicy
{
	public $model_slug = 'factor';
}
