<?php

namespace Tests\Unit;

use App\Base\BaseTest;

class TeamTest extends BaseTest
{
    public $model = 'Team';

    public function test()
    {
        $this->resourceTest();
    }
}
