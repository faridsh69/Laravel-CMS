<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\Setting;

use App\Cms\Controllers\Admin\AdminSettingsController;

final class ContactController extends AdminSettingsController
{
	public string $modelNameSlug = 'setting-contact';
}
