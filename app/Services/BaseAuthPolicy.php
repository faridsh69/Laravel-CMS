<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BaseAuthPolicy
{
    use HandlesAuthorization;

    /*
    * Define in each policies to find model slug.
    */
    public string $modelNameSlug;

    public function index(User $user) : bool
    {
    	return true;
    }

    public function view(User $user, $list) : bool
    {
    	if($user->can($this->modelNameSlug . '_view')){
    		return true;
    	}

        return $user->id === $list->user_id;
    }

    public function create(User $user) : bool
    {
        return true;
    }

    public function update(User $user, $list) : bool
    {
    	if($user->can($this->modelNameSlug . '_update')){
    		return true;
    	}

        return $user->id === $list->user_id;
    }

    public function delete(User $user, $list) : bool
    {
    	if($user->can($this->modelNameSlug . '_delete')){
    		return true;
    	}

        return $user->id === $list->user_id;
    }
}
