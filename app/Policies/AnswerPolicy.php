<?php

namespace App\Policies;

use App\Services\BasePolicy;

class AnswerPolicy extends BasePolicy
{
	public string $modelNameSlug = 'answer';
}
