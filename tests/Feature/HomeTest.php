<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;

final class HomeTest extends TestCase
{
	public function testHome(): void
	{
		$response = $this->get('/');

		$response->assertStatus(200);
	}
}
