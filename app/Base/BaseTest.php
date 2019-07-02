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

        $this
            ->get(route('admin.' . strtolower($this->model) . '.redirect'))
            ->assertStatus(302);

        $fake_data = factory($class_name)->raw();

        $this
            ->post(route('admin.' . strtolower($this->model) . '.list.store', $fake_data))
            ->assertStatus(302);

        $data = $model_class->orderBy('id', 'desc')->first();

        $this
            ->get(route('admin.' . strtolower($this->model) . '.list.show', $data))
            ->assertStatus(200);

        $this
            ->get(route('admin.' . strtolower($this->model) . '.list.edit', $data))
            ->assertStatus(200);

        if($this->model === 'User' || $this->model === 'Category' || $this->model === 'Menu'
            || $this->model === 'Block')
        {
        }else{
            $this
                ->put(route('admin.' . strtolower($this->model) . '.list.update', $data), $fake_data)
                ->assertStatus(302);

            $this
                ->delete(route('admin.' . strtolower($this->model) . '.list.destroy', $data))
                ->assertStatus(302);
        }
        // $this
        //     ->get(route('admin.' . strtolower($this->model) . '.list.restore', $data))
        //     ->assertStatus(302);
    }

    private function _checkMethod($mothod_name)
    {
        $this
            ->get(route('admin.' . strtolower($this->model) . '.' . $mothod_name))
            ->assertStatus(200);
    }
}
