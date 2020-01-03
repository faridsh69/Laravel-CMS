<?php

namespace App\Enums;

use App\Services\BaseEnum;

final class HtmlDirection extends BaseEnum
{
    const data = [
		'rtl' => 'Right to left',
		'ltr' => 'Left to right',
	];
}
