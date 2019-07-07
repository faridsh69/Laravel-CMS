<?php

namespace Tests\Unit;

use App\Base\BaseTest;

class ThemeTest extends BaseTest
{
    public $model = 'Theme';

    public function test()
    {
        $this->resourceTest();
    }
}
