<?php

namespace Tests\Unit;

use App\Services\BaseTest;

class TagendTest extends BaseTest
{
    public $model = 'Tagend';

    public function test()
    {
        $this->resourceTest();
    }
}
