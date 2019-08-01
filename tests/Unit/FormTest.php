<?php

namespace Tests\Unit;

use App\Base\BaseTest;

class FormTest extends BaseTest
{
    public $model = 'Form';

    public function test()
    {
        $this->resourceTest();
    }
}
