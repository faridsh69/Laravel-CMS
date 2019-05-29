<?php

namespace Tests\Unit;

use App\Base\BaseTest;

class BlogTest extends BaseTest
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public $model = 'Blog';

    public function testExample()
    {
        $this->resourceTest();
    }
}
