<?php

namespace Tests\Unit;

use App\Services\BaseTest;

class UserTest extends BaseTest
{
    public $model = 'User';

    public function test()
    {
        $this->resourceTest();
    }
}
