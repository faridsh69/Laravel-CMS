<?php

namespace App\Enums;

use App\Services\BaseEnum;

final class ModelType extends BaseEnum
{
    const data = [
		'food' => 'Food',
		'food-program' => 'Food Program',
		'gym' => 'Gym',
		'gym-action' => 'Gym Action',
		'gym-program' => 'Gym Program',
		'music' => 'Music',
		'movie' => 'Movie',
		'advertise' => 'Advertise',
		'blog' => 'Blog',
		'car' => 'Car',
		'page' => 'Page',
		'product' => 'Product',
		'restaurant' => 'Restaurant',
		'shop' => 'Shop',
		'tour' => 'Tour',
	];
}
