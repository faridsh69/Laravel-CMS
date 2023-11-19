<?php

declare(strict_types=1);

namespace App\Providers;

use App\Cms\Providers\CmsServiceProvider;
use Illuminate\Support\ServiceProvider;

final class AppServiceProvider extends ServiceProvider
{
	public function register(): void
	{
	}

	public function boot(): void
	{
		CmsServiceProvider::bootCms();
	}
}
