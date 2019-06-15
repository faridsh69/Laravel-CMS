<?php

namespace Tests\Unit;

use App\Base\BaseTest;

class CommentTest extends BaseTest
{
    public $model = 'Comment';

    public function test()
    {
        $this->resourceTest();
    }
}
