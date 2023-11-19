<?php

declare(strict_types=1);

namespace App\Enums;

final class AppEnv
{
	public const data = [
		'production' => 'Production',
		'development' => 'Development',
		'testing' => 'Testing',
		'local' => 'Local',
		'staging' => 'Staging',
	];
}
