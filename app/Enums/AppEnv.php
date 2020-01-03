<?php

namespace App\Enums;

use App\Services\BaseEnum;

final class AppEnv extends BaseEnum
{
    const data = [
		'production' => 'Production',
		'development' => 'Development',
		'testing' => 'Testing',
		'local' => 'Local',
		'staging' => 'Staging',
	];
}
