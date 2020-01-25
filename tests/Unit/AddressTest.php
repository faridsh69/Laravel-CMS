<?php

namespace Tests\Unit;

use App\Services\BaseTest;

class AddressTest extends BaseTest
{
    public $model = 'Address';

    public function test()
    {
        $this->resourceTest();
    }
}
