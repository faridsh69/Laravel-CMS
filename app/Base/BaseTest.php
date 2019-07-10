<?php

namespace App\Base;

use App\Models\User;
use Tests\TestCase;

class BaseTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public $model;

    public $methods = [
        // 'pdf',
        'print',
        'export',
        'datatable',
        'list.index',
        'list.create',
    ];

    public function resourceTest()
    {

        $class_name = 'App\\Models\\' . $this->model;
        $model_class = new $class_name();

        $user = User::first();
        $this->actingAs($user);

        foreach($this->methods as $method)
        {
            $this->_checkMethod($method);
        }

        // redirect
        $this
            ->get(route('admin.' . strtolower($this->model) . '.redirect'))
            ->assertRedirect(route('admin.' . strtolower($this->model) . '.list.index'));

        // create fake data for store in database
        $fake_data = factory($class_name)->raw();

        // store fake model
        $this
            ->post(route('admin.' . strtolower($this->model) . '.list.store', $fake_data))
            ->assertRedirect(route('admin.' . strtolower($this->model) . '.list.index'));

        // get fake model that created at this test
        $fake_model = $model_class->orderBy('id', 'desc')->first();

        // show fake model
        $this
            ->get(route('admin.' . strtolower($this->model) . '.list.show', $fake_model))
            ->assertOk();

        // edit fake model
        $this
            ->get(route('admin.' . strtolower($this->model) . '.list.edit', $fake_model))
            ->assertOk();

        // update fake model
        $this
            ->put(route('admin.' . strtolower($this->model) . '.list.update', $fake_model), $fake_data)
            ->assertRedirect(route('admin.' . strtolower($this->model) . '.list.index'));

        // delete fake model
        $this
            ->delete(route('admin.' . strtolower($this->model) . '.list.destroy', $fake_model))
            ->assertRedirect(route('admin.' . strtolower($this->model) . '.list.index'));

        // restore fake model
        $this
            ->get(route('admin.' . strtolower($this->model) . '.list.restore', $fake_model))
            ->assertRedirect(route('admin.' . strtolower($this->model) . '.list.index'));

        // force delete fake model
        $fake_model->forceDelete();
    }

    private function _checkMethod($mothod_name)
    {
        $this
            ->get(route('admin.' . strtolower($this->model) . '.' . $mothod_name))
            ->assertOk();
    }
}
