<?php

namespace Tests\Unit;

use App\Base\BaseTest;

class ShopTest extends BaseTest
{
    public $model = 'Shop';

    public function test()
    {
        $this->resourceTest();
    }
}
