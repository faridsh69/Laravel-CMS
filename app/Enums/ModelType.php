<?php

namespace App\Enums;

use App\Services\BaseEnum;

final class ModelType extends BaseEnum
{
    const data = [
		'Food' => 'Food',
		'FoodProgram' => 'Food Program',
		'Gym' => 'Gym',
		'GymAction' => 'Gym Action',
		'GymProgram' => 'Gym Program',
		'Music' => 'Music',
		'Movie' => 'Movie',
		'Advertise' => 'Advertise',
		'Blog' => 'Blog',
		'Car' => 'Car',
		'Page' => 'Page',
		'Product' => 'Product',
		'Restaurant' => 'Restaurant',
		'Shop' => 'Shop',
		'Tour' => 'Tour',
	];
}
