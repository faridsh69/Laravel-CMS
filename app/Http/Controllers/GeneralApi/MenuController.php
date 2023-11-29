<?php

declare(strict_types=1);

namespace App\Http\Controllers\GeneralApi;

use App\Cms\Traits\ApiTrait;
use App\Http\Resources\MenuResource;
use App\Models\Category;


final class MenuController
{
	use ApiTrait;

	public function getData(Category $category)
	{
		$list = $category->OfType('food')->orderBy('order', 'asc')->with('foods')->get();

		return $this->setSuccessStatus()
			->setMessage(('List found'))
			->setData(MenuResource::collection($list))
			->prepareJsonResponse();
	}
}
