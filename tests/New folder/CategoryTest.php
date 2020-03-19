<?php

namespace Tests\Unit;

use App\Services\BaseTest;

class CategoryTest extends BaseTest
{
    public $model = 'Category';

    public function test()
    {
        $this->resourceTest();
    }
}
