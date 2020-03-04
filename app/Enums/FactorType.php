<?php

namespace App\Enums;

use App\Services\BaseEnum;

final class FactorType extends BaseEnum
{
    const data = [
		'Marketing budget' => 'Marketing budget',
		'Office supplies' => 'Office supplies',
		'Order' => 'Order',
		'Logistics' => 'Logistics',
		'Team Pay' => 'Team Pay',
	];
}

