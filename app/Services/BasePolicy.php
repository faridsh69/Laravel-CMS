<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BasePolicy
{
    use HandlesAuthorization;

    public $modelNameSlug;

    public function index(User $user)
    {
        return $user->can($this->modelSlug . '_index');
    }

    public function view(User $user, $list)
    {
        return $user->can($this->modelSlug . '_view');
    }

    public function create(User $user)
    {
        return $user->can($this->modelSlug . '_create');
    }

    public function update(User $user, $list)
    {
        return $user->can($this->modelSlug . '_update');
    }

    public function delete(User $user, $list)
    {
        return $user->can($this->modelSlug . '_delete');
    }
}
