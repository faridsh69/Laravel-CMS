<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BasePolicy
{
    use HandlesAuthorization;

    public string $modelNameSlug = 'user';

    public function index(User $user)
    {
        return $user->can($this->modelNameSlug . '_index');
    }

    public function view(User $user, $list)
    {
        return $user->can($this->modelNameSlug . '_view');
    }

    public function create(User $user)
    {
        return $user->can($this->modelNameSlug . '_create');
    }

    public function update(User $user, $list)
    {
        return $user->can($this->modelNameSlug . '_update');
    }

    public function delete(User $user, $list)
    {
        return $user->can($this->modelNameSlug . '_delete');
    }
}
