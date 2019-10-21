<?php

namespace App\Enums;

use App\Base\BaseEnum;

final class ThemeType extends BaseEnum
{
    const data = [
		'1-original' => 'Original',
		'2-shop' => 'Shop',
		'3-home' => 'Home',
		'4-windy' => 'Windy',
		'5-bootstrap' => 'Bootstrap',
	];
}
