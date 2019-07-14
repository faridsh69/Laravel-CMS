<?php

namespace Tests\Unit;

use App\Base\BaseTest;

class ActivityTest extends BaseTest
{
    public $model = 'Activity';

    public function test()
    {
        $this->resourceTest();
    }
}
