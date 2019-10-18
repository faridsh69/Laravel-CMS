<?php

namespace Tests\Unit;

use App\Base\BaseTest;

class RoleTest extends BaseTest
{
    public $model = 'Role';

    public function test()
    {
        $this->resourceTest();
    }
}
