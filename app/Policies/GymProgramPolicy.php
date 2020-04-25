<?php

namespace App\Policies;

use App\Services\BasePolicy;

class GymProgramPolicy extends BasePolicy 
{
	public $model_slug = 'gym-program';
}
