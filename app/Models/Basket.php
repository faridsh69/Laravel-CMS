<?php

declare(strict_types=1);

namespace App\Models;

use App\Cms\Models\CmsModel;

final class Basket extends CmsModel
{
	public $columns = [
		[
			'name' => 'activated',
		],
		[
			'name' => 'user_id',
		],
	];

	public function products()
	{
		return $this->belongsToMany(Product::class)->withPivot('count');
	}

	public static function getTotalPriceByRestaurantId($restaurantId)
	{
		// $restaurantId
		return 12;
	}
}
