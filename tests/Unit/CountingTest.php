<?php

namespace Tests\Unit;

use App\Base\BaseTest;

class CountingTest extends BaseTest
{
    public $model = 'Counting';

    public function test()
    {
        $this->resourceTest();
    }
}
