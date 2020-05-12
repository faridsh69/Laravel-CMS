<?php

namespace Tests\Unit;

use App\Services\BaseTest;

class FrontTest extends BaseTest
{
    public function test()
    {
    	$this->model_slugs = config('cms.front_tests');
        $this->frontTest();
    }
}
