<?php

namespace Tests\Unit;

use App\Base\BaseTest;

class BlogTest extends BaseTest
{
    public $model = 'Blog';

    public function test()
    {
        $this->resourceTest();
    }
}
