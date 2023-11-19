<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;

final class SettingTest extends TestCase
{
	public $methods = [
		'dashboard.index',
		'dashboard.activity',
		'dashboard.profile',
		'dashboard.identify',
		'report.index',
		'icon.list.index',
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

	public function test(): void
	{
		$user = User::first();
		$this->actingAs($user);

		foreach ($this->methods as $method) {
			$this->checkMethod($method);
		}
	}

	private function checkMethod($mothod_name): void
	{
		$this
			->get(route('admin.' . $mothod_name))
			->assertStatus(200);
	}
}
