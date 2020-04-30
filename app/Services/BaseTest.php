<?php

namespace App\Services;

use App\Models\User;
use Str;
use Tests\TestCase;

class BaseTest extends TestCase
{
    // an aray of models that want to test
    public $model_slugs;

    // single model to test
    public $model_slug;

    public $methods = [
        'print',
        'export',
        'datatable',
        'list.index',
        'list.create',
    ];

    public function resourceTest()
    {
        if($this->model_slugs === []){
            $this->model_slugs = [$this->model_slug];
            if($this->model_slug === null){
                $this->model_slugs = config('cms.admin_tests');
            }
        }

        foreach($this->model_slugs as $model_slug)
        {
            echo("\nTesting ". $model_slug. '...');
            $model_name = Str::studly($model_slug);
            $model_namespace = 'App\\Models\\'. $model_name;
            $model_repository = new $model_namespace();

            $user = User::first();
            $this->actingAs($user);

            // redirect
            $this
                ->get(route('admin.'. $model_slug. '.redirect'))
                ->assertRedirect(route('admin.'. $model_slug. '.list.index'));

            // create fake data for store in database
            $fake_data = factory($model_namespace)->raw();

            // store fake model
            $this
                ->post(route('admin.'. $model_slug. '.list.store', $fake_data))
                ->assertRedirect(route('admin.'. $model_slug. '.list.index'));

            // get fake model that created at this test
            $fake_model = $model_repository->orderBy('id', 'desc')->first();

            // show fake model
            $this
                ->get(route('admin.'. $model_slug. '.list.show', $fake_model))
                ->assertOk();

            // edit fake model
            $this
                ->get(route('admin.'. $model_slug. '.list.edit', $fake_model))
                ->assertOk();

            // update fake model
            $this
                ->put(route('admin.'. $model_slug. '.list.update', $fake_model), $fake_data)
                ->assertRedirect(route('admin.'. $model_slug. '.list.index'));

            // delete fake model
            $this
                ->delete(route('admin.'. $model_slug. '.list.destroy', $fake_model))
                ->assertRedirect(route('admin.'. $model_slug. '.list.index'));

            // restore fake model
            $this
                ->get(route('admin.'. $model_slug. '.list.restore', $fake_model))
                ->assertRedirect(route('admin.'. $model_slug. '.list.index'));

            // force delete fake model
            $fake_model->forceDelete();

            foreach($this->methods as $method)
            {
                $this->_checkMethod($method, $model);
            }
            echo('Done!');
        }
    }

    private function _checkMethod($mothod_name, $model)
    {
        $this
            ->get(route('admin.'. $model_slug. '.'. $mothod_name))
            ->assertOk();
    }
}
