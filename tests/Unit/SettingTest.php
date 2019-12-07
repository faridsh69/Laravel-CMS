<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;

class SettingTest extends TestCase
{
	public $methods = [
        'setting.general',
        'setting.contact',
        'setting.developer',
        'setting.advance',
        'setting.backup.index',
        'setting.log',
        'setting.api',
        'setting.seo.crowl',
        'setting.seo.content-rules',
        'report.index',
        'dashboard.index',
        'media.list.index',
    ];

    public function test()
    {
        $user = User::first();
        $this->actingAs($user);

        foreach($this->methods as $method)
        {
            $this->_checkMethod($method);
        }
    }

    private function _checkMethod($mothod_name)
    {
        $this
            ->get(route('admin.' . $mothod_name))
            ->assertStatus(200);
    }
}
