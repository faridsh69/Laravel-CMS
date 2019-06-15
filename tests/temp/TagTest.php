<?php

namespace Tests\Unit;

use App\Base\BaseTest;

class TagTest extends BaseTest
{
    public $model = 'Tag';

    public function test()
    {
        $this->resourceTest();
    }
}
