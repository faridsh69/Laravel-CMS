<?php

namespace Tests\Unit;

use App\Base\BaseTest;

class FeatureTest extends BaseTest
{
    public $model = 'Feature';

    public function test()
    {
        $this->resourceTest();
    }
}
