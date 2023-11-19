<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Cms\Services\SeederService;
use Illuminate\Database\Seeder as LaravelSeeder;

final class DatabaseSeeder extends LaravelSeeder
{
	public function run(): void
	{
		$this->call(Seeder001Categories::class);
		$this->call(Seeder002Tags::class);
		$this->call(Seeder003Users::class);
		$this->call(Seeder004Settings::class);
		$this->call(Seeder005Products::class);
		$this->call(Seeder006Pages::class);
		$this->call(Seeder007Blocks::class);
		$this->call(Seeder008Modules::class);
		$this->call(Seeder009Fields::class);
		$this->call(Seeder010Roles::class);

		$this->call(SeederService::class);

		$this->call(CmsLaravelWebsiteSeeder::class);
	}
}
