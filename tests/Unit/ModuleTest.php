<?php

namespace Tests\Unit;

use App\Services\BaseTest;

class ModuleTest extends BaseTest
{
    public $model = 'Module';

    public function test()
    {
        $this->resourceTest();
    }
}
