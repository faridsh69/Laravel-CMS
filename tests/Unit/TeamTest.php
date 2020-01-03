<?php

namespace Tests\Unit;

use App\Services\BaseTest;

class TeamTest extends BaseTest
{
    public $model = 'Team';

    public function test()
    {
        $this->resourceTest();
    }
}
