<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Block;
use Illuminate\Database\Seeder;

final class Seeder007Blocks extends Seeder
{
	public function run(): void
	{
		$blocks = [
			[
				'id' => 1,
				'order' => 10,
				'type' => 'menu',
				'show_all_pages' => 1,
				'pages_list' => [],
				'activated' => 1,
			],
			[
				'id' => 2,
				'order' => 20,
				'type' => 'header',
				'show_all_pages' => 0,
				'pages_list' => [1],
				'activated' => 1,
			],
			[
				'id' => 3,
				'order' => 30,
				'type' => 'breadcrumb',
				'show_all_pages' => 1,
				'pages_list' => [1],
				'activated' => 1,
			],
			[
				'id' => 4,
				'order' => 40,
				'type' => 'main_feature',
				'show_all_pages' => 0,
				'pages_list' => [1],
				'activated' => 1,
			],
			[
				'id' => 5,
				'order' => 50,
				'type' => 'feature',
				'show_all_pages' => 0,
				'pages_list' => [1],
				'activated' => 1,
			],
			[
				'id' => 6,
				'order' => 60,
				'type' => 'content',
				'show_all_pages' => 1,
				'pages_list' => [],
				'activated' => 1,
			],
			[
				'id' => 7,
				'order' => 70,
				'type' => 'introduce',
				'show_all_pages' => 0,
				'pages_list' => [1, 2],
				'activated' => 1,
			],
			[
				'id' => 8,
				'order' => 80,
				'type' => 'video',
				'show_all_pages' => 0,
				'pages_list' => [1],
				'activated' => 1,
			],
			[
				'id' => 9,
				'order' => 90,
				'type' => 'counting',
				'show_all_pages' => 0,
				'pages_list' => [1],
				'activated' => 1,
			],
			[
				'id' => 10,
				'order' => 100,
				'type' => 'product',
				'show_all_pages' => 0,
				'pages_list' => [1],
				'activated' => 1,
			],
			[
				'id' => 11,
				'order' => 110,
				'type' => 'service',
				'show_all_pages' => 0,
				'pages_list' => [1],
				'activated' => 1,
			],
			[
				'id' => 12,
				'order' => 120,
				'type' => 'pricing',
				'show_all_pages' => 0,
				'pages_list' => [1],
				'activated' => 1,
			],
			[
				'id' => 13,
				'order' => 130,
				'type' => 'testimonial',
				'show_all_pages' => 0,
				'pages_list' => [1],
				'activated' => 1,
			],
			[
				'id' => 14,
				'order' => 140,
				'type' => 'faq',
				'show_all_pages' => 0,
				'pages_list' => [1],
				'activated' => 1,
			],
			[
				'id' => 15,
				'order' => 150,
				'type' => 'partner',
				'show_all_pages' => 0,
				'pages_list' => [1],
				'activated' => 1,
			],
			[
				'id' => 16,
				'order' => 160,
				'type' => 'team',
				'show_all_pages' => 0,
				'pages_list' => [2], // about page
				'activated' => 1,
			],
			[
				'id' => 17,
				'order' => 170,
				'type' => 'blog',
				'show_all_pages' => 0,
				'pages_list' => [1],
				'activated' => 1,
			],
			[
				'id' => 18,
				'order' => 180,
				'type' => 'subscribe',
				'show_all_pages' => 1,
				'pages_list' => [],
				'activated' => 1,
			],
			[
				'id' => 19,
				'order' => 190,
				'type' => 'map',
				'show_all_pages' => 0,
				'pages_list' => [3], // contact page
				'activated' => 0,
			],
			[
				'id' => 20,
				'order' => 200,
				'type' => 'contact',
				'show_all_pages' => 0,
				'pages_list' => [3], // contact page
				'activated' => 1,
			],
			[
				'id' => 21,
				'order' => 210,
				'type' => 'footer',
				'show_all_pages' => 1,
				'pages_list' => [],
				'activated' => 1,
			],
			[
				'id' => 22,
				'order' => 220,
				'type' => 'loading',
				'show_all_pages' => 1,
				'pages_list' => [],
				'activated' => 1,
			],
			[
				'id' => 23,
				'order' => 230,
				'type' => 'form',
				'show_all_pages' => 0,
				'pages_list' => [4], // job page
				'activated' => 1,
			],
		];

		foreach ($blocks as $block) {
			$block_model = Block::updateOrCreate(
				[
					'id' => $block['id'],
				],
				[
					'title' => $block['type'],
					'order' => $block['order'],
					'type' => $block['type'],
					'show_all_pages' => $block['show_all_pages'],
					'activated' => $block['activated'],
				]
			);
			$block_model->pages()->sync($block['pages_list'], true);
		}
	}
}
