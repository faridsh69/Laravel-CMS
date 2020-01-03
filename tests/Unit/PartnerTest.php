<?php

namespace Tests\Unit;

use App\Services\BaseTest;

class PartnerTest extends BaseTest
{
    public $model = 'Partner';

    public function test()
    {
        $this->resourceTest();
    }
}
