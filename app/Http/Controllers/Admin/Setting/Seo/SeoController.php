<?php

namespace App\Http\Controllers\Admin\Setting\Seo;

use App\Base\BaseAdminController;

class SeoController extends BaseAdminController
{
	public function getCrowl()
	{
		$this->authorize('index_settingdeveloper');
		$this->meta['title'] = 'Seo Crwol Website';

		return view('admin.setting.seo.crowl', ['meta' => $this->meta]);
	}

	public function getContentRules()
	{
		$this->authorize('index_settingdeveloper');
		$this->meta['title'] = 'Seo Content Rules';

		return view('admin.setting.seo.content-rules', ['meta' => $this->meta]);
	}
}
