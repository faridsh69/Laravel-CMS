<?php

namespace Tests\Unit;

use App\Services\BaseTest;

class FactorTest extends BaseTest
{
    public $model = 'Factor';

    public function test()
    {
        $this->resourceTest();
    }
}
