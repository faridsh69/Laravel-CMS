<?php

namespace Tests\Unit;

use App\Services\BaseTest;

class BlogTest extends BaseTest
{
    public $model = 'Blog';

    public function test()
    {
        $this->resourceTest();
    }
}
