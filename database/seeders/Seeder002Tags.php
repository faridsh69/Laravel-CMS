<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Str;

final class Seeder002Tags extends Seeder
{
	public function run(): void
	{
		$tags = [
			[
				'title' => 'Development',
			],
			[
				'title' => 'Movie',
			],
			[
				'title' => '2020',
			],
			[
				'title' => 'Fitness',
			],
			[
				'title' => 'Funny',
			],
		];

		foreach ($tags as $tag) {
			$tag['type'] = 'Blog';
			$tag['url'] = Str::slug($tag['title']);
			Tag::firstOrCreate($tag);
		}
	}
}
