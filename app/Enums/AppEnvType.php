<?php

namespace App\Enums;

use App\Base\BaseEnum;

final class AppEnvType extends BaseEnum
{
    const data = [
		'production' => 'production',
		'local' => 'Local',
		'testing' => 'Testing',
		'staging' => 'staging',
	];
}
