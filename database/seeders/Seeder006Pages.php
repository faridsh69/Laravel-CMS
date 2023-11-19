<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

final class Seeder006Pages extends Seeder
{
	public function run(): void
	{
		$pages = [
			[
				'title' => 'Home',
				'url' => '/',
				'content' => 'This is home page content',
				'description' => 'Home page description',
				'activated' => 1,
				'google_index' => 1,
			],
			[
				'title' => 'About',
				'url' => 'about',
				'content' => '<h1>About Us</h1>',
				'description' => 'About page description',
				'activated' => 1,
				'google_index' => 1,
			],
			[
				'title' => 'Contact',
				'url' => 'contact',
				'content' => '<h1>Contact Us</h1>',
				'description' => 'Contact page description',
				'activated' => 1,
				'google_index' => 1,
			],
			[
				'title' => 'Job',
				'url' => 'job',
				'content' => null,
				'description' => 'Job page description',
				'activated' => 1,
				'google_index' => 1,
			],
		];

		foreach ($pages as $page) {
			$page['language'] = 'en';
			Page::firstOrCreate([
				'url' => $page['url'],
			], $page);
		}
	}
}
