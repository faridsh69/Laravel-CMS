<?php

namespace App\Enums;

use App\Services\BaseEnum;

final class FactorStatus extends BaseEnum
{
    const data = [
		1 => 'Initial',
		2 => 'Payment',
		3 => 'Proccessing',
		4 => 'Preparing',
		5 => 'Delivaering',
		6 => 'Canceled',
		7 => 'Succeed',
	];
}
