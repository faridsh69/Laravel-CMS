<?php

namespace Tests\Unit;

use App\Base\BaseTest;

class MenuTest extends BaseTest
{
    public $model = 'Menu';

    public function test()
    {
        $this->resourceTest();
    }
}
