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
		$list = $category->OfType('food')->orderBy('updated_at', 'desc')->with('foods')->get();

		return $this->setSuccessStatus()
			->setMessage(('List found'))
			->setData(MenuResource::collection($list))
			->prepareJsonResponse();
	}
}
