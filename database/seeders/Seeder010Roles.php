<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\{Permission, Role};

final class Seeder010Roles extends Seeder
{
	public function run(): void
	{
		$systemSlugs = [
			'setting_general',
			'setting_contact',
			'setting_developer',
			'setting_advance',
			'api',
			'log',
			'backup',
			'seo',
			'media',
			'report',
		];
		$modelNameSlugs = config('cms.policies');
		$roles = [];
		$permissions = [];
		foreach ($modelNameSlugs as $modelNameSlug) {
			$modelPermissions = [];
			$modelPermissions[] = Permission::updateOrCreate([
				'name' => $modelNameSlug . '_index',
			]);
			$modelPermissions[] = Permission::updateOrCreate([
				'name' => $modelNameSlug . '_view',
			]);
			$modelPermissions[] = Permission::updateOrCreate([
				'name' => $modelNameSlug . '_create',
			]);
			$modelPermissions[] = Permission::updateOrCreate([
				'name' => $modelNameSlug . '_update',
			]);
			$modelPermissions[] = Permission::updateOrCreate([
				'name' => $modelNameSlug . '_delete',
			]);

			$modelRole = Role::updateOrCreate([
				'name' => $modelNameSlug . '_manager',
			]);
			$modelRole->syncPermissions($modelPermissions);
			$roles[] = $modelRole->name;

			$permissions = array_merge($permissions, $modelPermissions);
		}

		foreach ($systemSlugs as $systemSlug) {
			$systemPermission = Permission::updateOrCreate([
				'name' => $systemSlug . '_manager',
			]);
			$systemRole = Role::updateOrCreate([
				'name' => $systemSlug . '_manager',
			]);
			$systemRole->syncPermissions([$systemPermission]);
			$roles[] = $systemRole->name;

			$permissions[] = $systemPermission;
		}

		$managerRole = Role::updateOrCreate([
			'name' => 'manager',
		]);
		$managerRole->syncPermissions($permissions);

		$admins = User::getAdminUsers();

		foreach ($admins as $admin) {
			$admin->syncRoles($roles);
		}
	}
}
