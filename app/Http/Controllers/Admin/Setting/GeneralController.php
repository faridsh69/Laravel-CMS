<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\Setting;

use App\Cms\Controllers\Admin\AdminSettingsController;

final class GeneralController extends AdminSettingsController
{
	public string $modelNameSlug = 'setting-general';
}
