<?php

namespace Tests\Unit;

use App\Services\BaseTest;

class PricingTest extends BaseTest
{
    public $model = 'Pricing';

    public function test()
    {
        $this->resourceTest();
    }
}
