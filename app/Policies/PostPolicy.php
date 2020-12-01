<?php

namespace App\Policies;

use App\Services\BaseAuthPolicy;

class PostPolicy extends BaseAuthPolicy
{
	public $modelNameSlug = 'post';
}
