<?php

namespace Tests\Unit;

use App\Base\BaseTest;

class ServiceTest extends BaseTest
{
    public $model = 'Service';

    public function test()
    {
        $this->resourceTest();
    }
}
