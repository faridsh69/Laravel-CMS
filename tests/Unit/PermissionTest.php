<?php

namespace Tests\Unit;

use App\Services\BaseTest;

class PermissionTest extends BaseTest
{
    public $model = 'Permission';

    public function test()
    {
        $this->resourceTest();
    }
}
