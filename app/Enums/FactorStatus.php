<?php

declare(strict_types=1);

namespace App\Enums;

final class FactorStatus
{
	public const data = [
		'Initial' => 'Initial',
		'Payment' => 'Payment',
		'Proccessing' => 'Proccessing',
		'Preparing' => 'Preparing',
		'Delivaering' => 'Delivaering',
		'Canceled' => 'Canceled',
		'Succeed' => 'Succeed',
	];
}
