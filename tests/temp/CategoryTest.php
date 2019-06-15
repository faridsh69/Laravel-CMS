<?php

namespace Tests\Unit;

use App\Base\BaseTest;

class CategoryTest extends BaseTest
{
    public $model = 'Category';

    public function test()
    {
        $this->resourceTest();
    }
}
