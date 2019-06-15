<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SettingTest extends TestCase
{
	public $methods = [
        'setting.general',
        'setting.contact',
        'setting.developer',
        'setting.advance',
        'setting.api',
        'setting.log',
        'setting.backup.index',
        'setting.seo.crowl',
        'setting.seo.content-rules',
        'report.index',
        'dashboard.index',
        'media.list.index',
        'user.permission.index',
        'user.role.index',
    ];

	private function _checkMethod($mothod_name)
    {
        $this
            ->get(route('admin.' . $mothod_name))
            ->assertStatus(200);
    }

    public function test()
    {
        $user = User::first();
        $this->actingAs($user);
        
        foreach($this->methods as $method)
        {
            $this->_checkMethod($method);
        }
    }
}
