<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Str;

final class Seeder001Categories extends Seeder
{
	public function run(): void
	{
		$categories = [
			[
				'type' => 'Blog',
				'title' => 'Health',
			],
			[
				'type' => 'Blog',
				'title' => 'Financial',
			],
			[
				'type' => 'Blog',
				'title' => 'Social',
			],
			[
				'type' => 'Blog',
				'title' => 'Personality',
			],
		];

		$order = 1;
		foreach ($categories as $category) {
			$category['language'] = 'en';
			$category['order'] = $order;
			$category['url'] = Str::slug($category['title']);
			Category::firstOrCreate($category);
			++$order;
		}
	}
}
