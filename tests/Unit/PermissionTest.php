<?php

namespace Tests\Unit;

use App\Base\BaseTest;

class PermissionTest extends BaseTest
{
    public $model = 'Permission';

    public function test()
    {
        $this->resourceTest();
    }
}
