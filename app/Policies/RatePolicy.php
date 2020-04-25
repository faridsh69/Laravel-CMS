<?php

namespace App\Policies;

use App\Services\BaseAuthPolicy;

class RatePolicy extends BaseAuthPolicy 
{
	public $model_slug = 'rate';
}
