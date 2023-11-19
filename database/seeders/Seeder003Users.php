<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

final class Seeder003Users extends Seeder
{
	public function run(): void
	{
		$users = [
			[
				'id' => 1,
				'first_name' => 'Farid',
				'last_name' => 'Shahidi',
				'url' => 'farid-shahidi',
				'email' => 'farid.sh69@gmail.com',
				'phone' => '09120568203',
				'password' => bcrypt('123456'),
				'activated' => 1,
			],
			// [
			//     'id' => 2,
			//     'first_name' => 'admin',
			//     'last_name' => 'cms',
			//     'url' => 'admin-cms',
			//     'email' => 'admin@cms.com',
			//     'phone' => '09120568202',
			//     'password' => bcrypt('123456'),
			//     'activated' => 1,
			// ],
			// [
			//     'id' => 3,
			//     'first_name' => 'Content',
			//     'last_name' => 'Writer',
			//     'url' => 'content-writer',
			//     'email' => 'content@cms.com',
			//     'phone' => '09120568201',
			//     'password' => bcrypt('123456'),
			//     'activated' => 1,
			// ],
		];
		foreach ($users as $user) {
			User::updateOrCreate([
				'id' => $user['id'],
			], $user);
		}
	}
}
