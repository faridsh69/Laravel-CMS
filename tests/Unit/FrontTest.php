<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Cms\Services\TestService;

final class FrontTest extends TestService
{
	public function test(): void
	{
		$this->frontTest();
	}
}
