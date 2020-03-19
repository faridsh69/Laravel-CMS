<?php

namespace Tests\Unit;

use App\Services\BaseTest;

class PageTest extends BaseTest
{
    public $model = 'Page';

    public function test()
    {
        $this->resourceTest();
    }
}
