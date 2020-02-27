<?php

namespace App\Enums;

use App\Services\BaseEnum;

final class FactorType extends BaseEnum
{
    const data = [
		'Order' => 'Order',
		'Marketing budget' => 'Marketing budget',
		'Office supplies' => 'Office supplies',
		'Logistics' => 'Logistics',
		'Team Pay' => 'Team Pay',
	];
}

