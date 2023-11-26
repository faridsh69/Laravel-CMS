<?php

declare(strict_types=1);

namespace App\Cms\Services;

use App\Models\{Category, Tag, User};
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Laravel\Passport\Passport;
use Str;
use Tests\TestCase;

abstract class TestService extends TestCase
{
	use WithoutMiddleware;

	private array $apiMethods = ['index'];

	private array $modelNameSlugs = [];

	private array $adminMethods = ['print', 'export', 'datatable', 'list.index', 'list.create'];

	private array $frontendMethods = ['index', 'category.index', 'tag.index'];

	final public function adminTest(): void
	{
		$this->modelNameSlugs = config('cms.admin_tests');

		foreach ($this->modelNameSlugs as $modelNameSlug) {
			echo "\nResource Testing " . $modelNameSlug . '...';
			$modelName = Str::studly($modelNameSlug);
			$modelNamespace = config('cms.config.models_namespace') . $modelName;
			$modelRepository = new $modelNamespace();

			$user = User::first();
			$this->actingAs($user);

			// redirect
			$this
				->get(route('admin.' . $modelNameSlug . '.redirect'))
				->assertRedirect(route('admin.' . $modelNameSlug . '.list.index'));

			// create fake data for store in database
			$factory = new FactoryService();
			$factory->setModelNameSlug($modelNameSlug);
			$fakeModel = $factory->make();
			$fakeData = $fakeModel->getAttributes();

			// store fake model
			$this
				->post(route('admin.' . $modelNameSlug . '.list.store', $fakeData))
				->assertRedirect(route('admin.' . $modelNameSlug . '.list.index'));

			// get fake model that created at this test
			$fakeModel = $modelRepository->orderBy('id', 'desc')->first();

			// show fake model
			$this
				->get(route('admin.' . $modelNameSlug . '.list.show', $fakeModel))
				->assertOk();

			// edit fake model
			$this
				->get(route('admin.' . $modelNameSlug . '.list.edit', $fakeModel))
				->assertOk();

			// update fake model
			$this
				->put(route('admin.' . $modelNameSlug . '.list.update', $fakeModel), $fakeData)
				->assertRedirect(route('admin.' . $modelNameSlug . '.list.index'));

			// delete fake model
			$this
				->delete(route('admin.' . $modelNameSlug . '.list.destroy', $fakeModel))
				->assertRedirect(route('admin.' . $modelNameSlug . '.list.index'));

			// restore fake model
			$this
				->get(route('admin.' . $modelNameSlug . '.list.restore', $fakeModel))
				->assertRedirect(route('admin.' . $modelNameSlug . '.list.index'));

			// force delete fake model
			$fakeModel->forceDelete();

			foreach ($this->adminMethods as $method) {
				$this
					->get(route('admin.' . $modelNameSlug . '.' . $method))
					->assertOk();
			}
			echo 'Done!';
		}
	}

	final public function frontTest(): void
	{
		$this->modelNameSlugs = config('cms.front_tests');

		foreach ($this->modelNameSlugs as $modelNameSlug) {
			echo "\nFront Testing " . $modelNameSlug . '...';
			$modelName = Str::studly($modelNameSlug);
			$modelNamespace = config('cms.config.models_namespace') . $modelName;
			$modelRepository = new $modelNamespace();

			$user = User::first();
			$this->actingAs($user);

			// get fake model that created at this test
			$fakeModel = $modelRepository->orderBy('id', 'desc')->first();

			// show fake model
			if ($fakeModel && isset($fakeModel->url) && $fakeModel->url) {
				$this
					->get(route('front.' . $modelNameSlug . '.show', $fakeModel->url))
					->assertOk();
			}

			// get model category
			$categoryModel = Category::ofType($modelName)->first();
			// show category of model
			if ($categoryModel) {
				$this
					->get(route('front.' . $modelNameSlug . '.category.show', $categoryModel->url))
					->assertOk();
				echo 'With Category...';
			}

			// get model tag
			$tagModel = Tag::ofType($modelName)->first();

			// show tag of model
			if ($tagModel) {
				$this
					->get(route('front.' . $modelNameSlug . '.tag.show', $tagModel->url))
					->assertOk();
				echo 'With Tag...';
			}

			foreach ($this->frontendMethods as $method) {
				$this
					->get(route('front.' . $modelNameSlug . '.' . $method))
					->assertOk();
			}
			echo 'Done!';
		}
	}

	final public function apiTest(): void
	{
		$this->modelNameSlugs = config('cms.api_tests');

		foreach ($this->modelNameSlugs as $modelNameSlug) {
			echo "\nAPI Testing " . $modelNameSlug . '...';
			$modelName = Str::studly($modelNameSlug);
			$modelNamespace = config('cms.config.models_namespace') . $modelName;
			$modelRepository = new $modelNamespace();

			$user = User::first();
			Passport::actingAs($user, ['*']);

			// create fake data for store in database
			$factory = new FactoryService();
			$factory->setModelNameSlug($modelNameSlug);
			$fakeModel = $factory->make();
			$fakeData = $fakeModel->getAttributes();

			// store fake model
			$this
				->post(route('api.' . $modelNameSlug . '.store', $fakeData))
				->assertOk();

			// get fake model that created at this test
			$fakeStoredModel = $modelRepository->orderBy('id', 'desc')->first();

			if ($fakeStoredModel->id === 1) {
				return;
			}

			// show fake model
			$this
				->get(route('api.' . $modelNameSlug . '.get-by-id', $fakeStoredModel))
				->assertOk();

			// update fake model
			$this
				->put(route('api.' . $modelNameSlug . '.update-by-id', $fakeStoredModel), $fakeData)
				->assertOk();

			// delete fake model
			$this
				->delete(route('api.' . $modelNameSlug . '.destroy-by-id', $fakeStoredModel))
				->assertOk();

			// force delete fake model
			$fakeStoredModel->forceDelete();

			foreach ($this->apiMethods as $method) {
				$this
					->get(route('front.' . $modelNameSlug . '.' . $method))
					->assertOk();
			}

			echo 'Done!';
		}
	}
}
