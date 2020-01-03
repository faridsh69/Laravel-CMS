<?php

namespace Tests\Unit;

use App\Services\BaseTest;

class FeedbackTest extends BaseTest
{
    public $model = 'Feedback';

    public function test()
    {
        $this->resourceTest();
    }
}
