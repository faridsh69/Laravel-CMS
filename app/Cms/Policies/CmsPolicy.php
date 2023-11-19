<?php

declare(strict_types=1);

namespace App\Cms\Policies;

use App\Models\User;

abstract class CmsPolicy
{
	public string $modelNameSlug = 'user';

	private string $guardName = 'web';

	final public function index(User $user)
	{
		return $this->hasPermission($user, 'index');
	}

	final public function view(User $user)
	{
		return $this->hasPermission($user, 'view');
	}

	final public function create(User $user)
	{
		return $this->hasPermission($user, 'create');
	}

	final public function update(User $user, $list)
	{
		return $this->hasPermission($user, 'update');
	}

	final public function delete(User $user, $list)
	{
		return $this->hasPermission($user, 'delete');
	}

	private function hasPermission(User $user, string $action)
	{
		return $user->hasPermissionTo($this->modelNameSlug . '_' . $action, $this->guardName);
	}
}
