<?php

namespace Tests\Unit;

use App\Services\BaseTest;

class FieldTest extends BaseTest
{
    public $model = 'Field';

    public function test()
    {
        $this->resourceTest();
    }
}
