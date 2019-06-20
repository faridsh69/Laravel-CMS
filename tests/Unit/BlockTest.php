<?php

namespace Tests\Unit;

use App\Base\BaseTest;

class BlockTest extends BaseTest
{
    public $model = 'Block';

    public function test()
    {
        $this->resourceTest();
    }
}
