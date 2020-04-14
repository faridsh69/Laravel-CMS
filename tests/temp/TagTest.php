<?php

namespace Tests\Unit;

use App\Services\BaseTest;

class TagTest extends BaseTest
{
    public $model = 'Tag';

    public function test()
    {
        $this->resourceTest();
    }
}
