<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Str;
use Tests\TestCase;

class BaseTest extends TestCase
{
    // an aray of models that want to test
    public array $modelNameSlugs;

    // single model to test
    public string $modelNameSlug;

    public $resource_methods = [
        'print',
        'export',
        'datatable',
        'list.index',
        'list.create',
    ];

    public $front_methods = [
        'index',
        'category.index',
        'tag.index',
    ];

    public function adminTest()
    {
        $this->modelNameSlugs = config('cms.admin_tests');

        foreach($this->modelNameSlugs as $modelNameSlug)
        {
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
            $fake_data = factory($modelNamespace)->raw();

            // store fake model
            $this
                ->post(route('admin.' . $modelNameSlug . '.list.store', $fake_data))
                ->assertRedirect(route('admin.' . $modelNameSlug . '.list.index'));

            // get fake model that created at this test
            $fake_model = $modelRepository->orderBy('id', 'desc')->first();

            // show fake model
            $this
                ->get(route('admin.' . $modelNameSlug . '.list.show', $fake_model))
                ->assertOk();

            // edit fake model
            $this
                ->get(route('admin.' . $modelNameSlug . '.list.edit', $fake_model))
                ->assertOk();

            // update fake model
            $this
                ->put(route('admin.' . $modelNameSlug . '.list.update', $fake_model), $fake_data)
                ->assertRedirect(route('admin.' . $modelNameSlug . '.list.index'));

            // delete fake model
            $this
                ->delete(route('admin.' . $modelNameSlug . '.list.destroy', $fake_model))
                ->assertRedirect(route('admin.' . $modelNameSlug . '.list.index'));

            // restore fake model
            $this
                ->get(route('admin.' . $modelNameSlug . '.list.restore', $fake_model))
                ->assertRedirect(route('admin.' . $modelNameSlug . '.list.index'));

            // force delete fake model
            $fake_model->forceDelete();

            foreach($this->resource_methods as $method)
            {
                $this
                    ->get(route('admin.' . $modelNameSlug . '.' . $method))
                    ->assertOk();
            }
            echo 'Done!';
        }
    }

    public function frontTest()
    {
        $this->modelNameSlugs = config('cms.front_tests');

        foreach($this->modelNameSlugs as $modelNameSlug)
        {
            echo "\nFront Testing " . $modelNameSlug . '...';
            $modelName = Str::studly($modelNameSlug);
            $modelNamespace = config('cms.config.models_namespace') . $modelName;
            $modelRepository = new $modelNamespace();

            $user = User::first();
            $this->actingAs($user);

            // get fake model that created at this test
            $fake_model = $modelRepository->orderBy('id', 'desc')->first();

            // show fake model
            if($fake_model && isset($fake_model->url)) {
                $this
                    ->get(route('front.' . $modelNameSlug . '.show', $fake_model->url))
                    ->assertOk();
            }

            // get model category
            $category_model = Category::ofType($modelName)->first();
            // show category of model
            if($category_model){
                $this
                    ->get(route('front.' . $modelNameSlug . '.category.show', $category_model->url))
                    ->assertOk();
                echo 'With Category...';
            }

            // get model tag
            $tag_model = Tag::ofType($modelName)->first();

            // show tag of model
            if($tag_model){
                $this
                    ->get(route('front.' . $modelNameSlug . '.tag.show', $tag_model->url))
                    ->assertOk();
                echo 'With Tag...';
            }

            foreach($this->front_methods as $method)
            {
                $this
                    ->get(route('front.' . $modelNameSlug . '.' . $method))
                    ->assertOk();
            }
            echo 'Done!';
        }
    }
}
