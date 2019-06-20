<?php

namespace Tests\Unit;

use App\Base\BaseTest;

class WidgetTest extends BaseTest
{
    public $model = 'Widget';

    public function test()
    {
        $this->resourceTest();
    }
}
