<?php

namespace App\Services;

use App\Models\User;
use Tests\TestCase;

class BaseTest extends TestCase
{
    // an aray of models that want to test
    public $models;

    // single model to test
    public $model;

    public $methods = [
        'print',
        'export',
        'datatable',
        'list.index',
        'list.create',
    ];

    public function resourceTest()
    {
        $models = $this->models;
        if(isset($this->model) && !isset($this->models)){
            $models = [$this->model];
        }
        foreach($models as $model)
        {
            echo("\nTesting " . $model . '...');
            $model_name = ucfirst($model);
            $class_name = 'App\\Models\\' . $model_name;
            $model_class = new $class_name();

            $user = User::first();
            $this->actingAs($user);

            // redirect
            $this
                ->get(route('admin.' . strtolower($model) . '.redirect'))
                ->assertRedirect(route('admin.' . strtolower($model) . '.list.index'));

            // create fake data for store in database
            $fake_data = factory($class_name)->raw();

            // store fake model
            $this
                ->post(route('admin.' . strtolower($model) . '.list.store', $fake_data))
                ->assertRedirect(route('admin.' . strtolower($model) . '.list.index'));

            // get fake model that created at this test
            $fake_model = $model_class->orderBy('id', 'desc')->first();

            // show fake model
            $this
                ->get(route('admin.' . strtolower($model) . '.list.show', $fake_model))
                ->assertOk();

            // edit fake model
            $this
                ->get(route('admin.' . strtolower($model) . '.list.edit', $fake_model))
                ->assertOk();

            // update fake model
            $this
                ->put(route('admin.' . strtolower($model) . '.list.update', $fake_model), $fake_data)
                ->assertRedirect(route('admin.' . strtolower($model) . '.list.index'));

            // delete fake model
            $this
                ->delete(route('admin.' . strtolower($model) . '.list.destroy', $fake_model))
                ->assertRedirect(route('admin.' . strtolower($model) . '.list.index'));

            // restore fake model
            $this
                ->get(route('admin.' . strtolower($model) . '.list.restore', $fake_model))
                ->assertRedirect(route('admin.' . strtolower($model) . '.list.index'));

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
            ->get(route('admin.' . strtolower($model) . '.' . $mothod_name))
            ->assertOk();
    }
}
