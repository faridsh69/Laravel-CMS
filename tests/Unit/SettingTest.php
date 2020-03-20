<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;

class SettingTest extends TestCase
{
	public $methods = [
        'dashboard.list.index',
        'dashboard.activity',
        'dashboard.profile',
        'dashboard.identify',
        'report.list.index',
        'media.list.index',
        'setting.general',
        'setting.contact',
        'setting.developer',
        'setting.advance',
        'setting.backup.index',
        'setting.log',
        'setting.api',
        'setting.seo.crowl',
        'setting.seo.content-rules',
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
