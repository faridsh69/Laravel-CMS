<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BasePolicy
{
    use HandlesAuthorization;

    public $model;

    public $model_sm;

    public function __construct()
    {
        $this->model_sm = strtolower($this->model);
    }

    public function index(User $user)
    {
        return $user->can('index_' . $this->model_sm);
    }

    /**
     * Determine whether the user can view the blog.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function view(User $user, $list)
    {
        return $user->can('view_' . $this->model_sm);
    }

    /**
     * Determine whether the user can create blogs.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('create_' . $this->model_sm);
    }

    /**
     * Determine whether the user can update the blog.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function update(User $user, $list)
    {
        return $user->can('update_' . $this->model_sm);
    }

    /**
     * Determine whether the user can delete the blog.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function delete(User $user, $list)
    {
        return $user->can('delete_' . $this->model_sm);
    }

    public function restore(User $user, $list)
    {
        return $user->can('index_' . $this->model_sm);
    }

    public function datatable(User $user)
    {
        return $user->can('index_' . $this->model_sm);
    }

    public function export(User $user)
    {
        return $user->can('index_' . $this->model_sm);
    }

    public function pdf(User $user)
    {
        return $user->can('index_' . $this->model_sm);
    }

    public function print(User $user)
    {
        return $user->can('index_' . $this->model_sm);
    }

    public function import(User $user)
    {
        return $user->can('index_' . $this->model_sm);
    }

    public function changeStatus(User $user)
    {
        return $user->can('update_' . $this->model_sm);
    }
}
