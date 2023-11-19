<?php

declare(strict_types=1);

namespace App\Providers;

use Cache;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;
use Str;

final class AuthServiceProvider extends ServiceProvider
{
	protected $policies = [];

	public function boot(): void
	{
		$this->policies = Cache::remember('policies', config('cms.config.cache_time'), function () {
			$modelNameSlugs = config('cms.policies');
			$models_namespace = config('cms.config.models_namespace');
			$policies = [];
			foreach ($modelNameSlugs as $modelNameSlug) {
				$modelName = Str::studly($modelNameSlug);
				$modelNamespace = $models_namespace . $modelName;
				$model_policy = 'App\Policies\\' . $modelName . 'Policy';
				$policies[$modelNamespace] = $model_policy;
			}

			return $policies;
		});
		$this->registerPolicies();

		Gate::define('manage', fn ($user, $page) => $user->can($page . '_manager'));

		Passport::routes();
	}
}
