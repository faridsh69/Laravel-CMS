<?php

namespace Tests\Unit;

use App\Base\BaseTest;

class PageTest extends BaseTest
{
    public $model = 'Page';

    public function test()
    {
        $this->resourceTest();
    }
}
