<?php

namespace Tests\Unit;

use App\Services\BaseTest;

class CountingTest extends BaseTest
{
    public $model = 'Counting';

    public function test()
    {
        $this->resourceTest();
    }
}
