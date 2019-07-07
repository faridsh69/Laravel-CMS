<?php

namespace Tests\Unit;

use App\Base\BaseTest;

class PartnerTest extends BaseTest
{
    public $model = 'Partner';

    public function test()
    {
        $this->resourceTest();
    }
}
