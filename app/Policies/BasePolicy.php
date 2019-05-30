<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BasePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the blog.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Blog  $blog
     * @return mixed
     */


    // public $model = 'Blog';
    public $model;

    // public $model_sm = 'blog';
    public $model_sm;

    public $repository;

    public function __construct()
    {
        // $this->model_sm = lcfirst($this->model);
        // $class_name = 'App\\Models\\' . $this->model;
        // $this->repository = new $class_name();
    }

    public function show()
    {
        return true;
    }

    public function view(User $user, Blog $blog)
    {
        1
        if ($blog->activated) {
            return true;
        }

        if ($user === null) {
            return false;
        }

        // admin overrides published status
        if ($user->can('view unpublished blog')) {
            return true;
        }
    }

    /**
     * Determine whether the user can create blogs.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
        if ($user->can('create blogs')) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the blog.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Blog  $blog
     * @return mixed
     */
    public function update(User $user, Blog $blog)
    {
        if ($user->can('edit blogs')) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the blog.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Blog  $blog
     * @return mixed
     */
    public function delete(User $user, Blog $blog)
    {
        if ($user->can('delete blog')) {
            return true;
        }
    }

    public function datatable(User $user)
    {
        return true;
    }
    
    public function export(User $user)
    {
        return true;
    }

    public function pdf(User $user)
    {
        return false;
    }

    public function print(User $user)
    {
        return true;
    }
    
    public function import(User $user)
    {
        return true;
    }

    public function changeStatus(User $user)
    {
        return true;
    }        
}
