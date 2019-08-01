<?php

namespace Tests\Unit;

use App\Base\BaseTest;

class FieldTest extends BaseTest
{
    public $model = 'Field';

    public function test()
    {
        $this->resourceTest();
    }
}
