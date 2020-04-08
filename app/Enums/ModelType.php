<?php

namespace App\Enums;

use App\Services\BaseEnum;

final class ModelType extends BaseEnum
{
    const data = [
		'blog' => 'Blog',
		'page' => 'Page',
		'product' => 'Product',
	];
}
