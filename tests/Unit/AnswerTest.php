<?php

namespace Tests\Unit;

use App\Services\BaseTest;

class AnswerTest extends BaseTest
{
    public $model = 'Answer';

    public function test()
    {
        $this->resourceTest();
    }
}
