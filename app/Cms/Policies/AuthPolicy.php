<?php

declare(strict_types=1);

namespace App\Cms\Policies;

use App\Models\User;

abstract class AuthPolicy
{
	public string $modelNameSlug;

	private string $guardName = 'web';

	final public function index(): bool
	{
		return true;
	}

	final public function view(User $user, $model): bool
	{
		return $this->hasPermission($user, 'view') ?? $user->id === $model->user_id;
	}

	final public function create(): bool
	{
		return true;
	}

	final public function update(User $user, $model): bool
	{
		return $this->hasPermission($user, 'update') ?? $user->id === $model->user_id;
	}

	final public function delete(User $user, $model): bool
	{
		return $this->hasPermission($user, 'delete') ?? $user->id === $model->user_id;
	}

	private function hasPermission(User $user, string $action)
	{
		return $user->hasPermissionTo($this->modelNameSlug . '_' . $action, $this->guardName);
	}
}
