<?php

namespace Tests\Unit;

use App\Services\BaseTest;

class ServiceTest extends BaseTest
{
    public $model = 'Service';

    public function test()
    {
        $this->resourceTest();
    }
}
