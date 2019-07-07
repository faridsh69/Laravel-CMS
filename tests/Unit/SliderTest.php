<?php

namespace Tests\Unit;

use App\Base\BaseTest;

class SliderTest extends BaseTest
{
    public $model = 'Slider';

    public function test()
    {
        $this->resourceTest();
    }
}
