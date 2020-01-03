<?php

namespace Tests\Unit;

use App\Services\BaseTest;

class CommentTest extends BaseTest
{
    public $model = 'Comment';

    public function test()
    {
        $this->resourceTest();
    }
}
