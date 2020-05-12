<?php

namespace Tests\Unit;

use App\Services\BaseTest;

class ResourceTest extends BaseTest
{
    public function test()
    {
    	$this->model_slugs = config('cms.admin_tests');
        $this->resourceTest();
    }
}
