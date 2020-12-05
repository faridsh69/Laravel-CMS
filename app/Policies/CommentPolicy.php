<?php

namespace App\Policies;

use App\Services\BasePolicy;

class CommentPolicy extends BasePolicy
{
	public string $modelNameSlug = 'comment';
}
