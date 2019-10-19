<?php

namespace App\Enums;

use App\Base\BaseEnum;

final class ThemeType extends BaseEnum
{
    const data = [
		'1-original' => 'Original ltr',
		'2-persian' => 'Original rtl',
		'3-home' => 'Rent Home',
		'4-windy' => 'Windy',
		'5-bootstrap' => 'Simple',
	];
}
