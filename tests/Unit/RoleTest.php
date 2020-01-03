<?php

namespace Tests\Unit;

use App\Services\BaseTest;

class RoleTest extends BaseTest
{
    public $model = 'Role';

    public function test()
    {
        $this->resourceTest();
    }
}
