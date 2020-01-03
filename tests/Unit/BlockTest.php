<?php

namespace Tests\Unit;

use App\Services\BaseTest;

class BlockTest extends BaseTest
{
    public $model = 'Block';

    public function test()
    {
        $this->resourceTest();
    }
}
