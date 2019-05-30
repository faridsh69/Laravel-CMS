<?php

namespace Tests\Unit;

use App\Base\BaseTest;

class UserTest extends BaseTest
{
    public $model = 'User';

    public function testExample()
    {
        $this->resourceTest();
    }
}
