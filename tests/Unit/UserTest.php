<?php

namespace Tests\Unit;

use App\Base\BaseTest;

class UserTest extends BaseTest
{
    public $model = 'User';

    public function test()
    {
        $this->resourceTest();
    }
}
