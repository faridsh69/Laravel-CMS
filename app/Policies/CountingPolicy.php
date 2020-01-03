<?php

namespace App\Policies;

use App\Services\BasePolicy;

class CountingPolicy extends BasePolicy
{
    public $model = 'Counting';
}
