<?php

namespace Tests\Unit;

use App\Base\BaseTest;

class FeedbackTest extends BaseTest
{
    public $model = 'Feedback';

    public function test()
    {
        $this->resourceTest();
    }
}
