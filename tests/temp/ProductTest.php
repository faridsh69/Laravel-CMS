<?php

namespace Tests\Unit;

use App\Services\BaseTest;

class ProductTest extends BaseTest
{
    public $model = 'Product';

    public function test()
    {
        $this->resourceTest();
    }
}
