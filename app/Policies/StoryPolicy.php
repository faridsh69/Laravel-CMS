<?php

namespace App\Policies;

use App\Services\BaseAuthPolicy;

class StoryPolicy extends BaseAuthPolicy 
{
	public $model_slug = 'story';
}
