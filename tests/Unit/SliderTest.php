<?php

namespace Tests\Unit;

use App\Services\BaseTest;

class SliderTest extends BaseTest
{
    public $model = 'Slider';

    public function test()
    {
        $this->resourceTest();
    }
}
