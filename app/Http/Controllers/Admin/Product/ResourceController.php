<?php

namespace App\Http\Controllers\Admin\Product;

use App\Base\BaseListController;

class ResourceController extends BaseListController
{
	public $model = 'Product';

	public function getRemoveImage($id)
	{
		$image = \App\Models\Image::find($id);
		$image->delete();

		return redirect()->back();
	}
}
