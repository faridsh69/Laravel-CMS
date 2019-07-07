<?php

namespace Tests\Unit;

use App\Base\BaseTest;

class PricingTest extends BaseTest
{
    public $model = 'Pricing';

    public function test()
    {
        $this->resourceTest();
    }
}
