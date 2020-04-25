<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Request;

class BasePolicy
{
    use HandlesAuthorization;

    public $model_slug;

    public function __construct()
    {
        if(!$this->model_slug){
            $this->model_slug = Request::segment(2);
        }
    }

    public function index(User $user)
    {
        return $user->can($this->model_slug. '_index');
    }

    public function view(User $user, $list)
    {
        return $user->can($this->model_slug. '_view');
    }

    public function create(User $user)
    {
        return $user->can($this->model_slug. '_create');
    }

    public function update(User $user, $list)
    {
        return $user->can($this->model_slug. '_update');
    }

    public function delete(User $user, $list)
    {
        return $user->can($this->model_slug. '_delete');
    }
}
