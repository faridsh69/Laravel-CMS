<?php

namespace Tests\Unit;

use App\Services\BaseTest;

class FormTest extends BaseTest
{
    public $model = 'Form';

    public function test()
    {
        $this->resourceTest();
    }
}
