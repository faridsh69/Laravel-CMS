<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\{Product, Tagend};
use Illuminate\Database\Seeder;
use Str;

final class Seeder005Products extends Seeder
{
	public function run(): void
	{
		$products = [
			[
				'title' => 'Dollor',
				'price' => '1',
			],
			[
				'title' => 'Teter USDT Erc20',
				'price' => '13800',
			],
			[
				'title' => 'PolkaDot',
				'price' => '8000',
			],
			[
				'title' => 'Bitcoin',
				'price' => '89800000',
			],
			[
				'title' => 'Perfect Money',
				'price' => '11390',
			],
			[
				'title' => 'Web money',
				'price' => '8300',
			],
			[
				'title' => 'Ripple',
				'price' => '6200',
			],
			[
				'title' => 'Ltc',
				'price' => '3800',
			],
			[
				'title' => 'Dogecoin',
				'price' => '1200',
			],
		];

		$order = 1;
		foreach ($products as $product) {
			$product['order'] = $order;
			$product['language'] = 'en';
			$product['url'] = Str::slug($product['title']);
			$product['category_id'] = 1;
			++$order;

			Product::firstOrCreate($product);
		}

		$tagends = [
			[
				'title' => 'Regular Shippment',
				'value' => 8000,
				'sign' => 1,
				'value_type' => 0,
				'is_copon' => 0,
				'code' => null,
				'activated' => 1,
				'user_id' => null,
			],
			[
				'title' => 'Advanced Shippment',
				'value' => 10000,
				'sign' => 1,
				'value_type' => 0,
				'is_copon' => 0,
				'code' => null,
				'activated' => 1,
				'user_id' => null,
			],
			[
				'title' => 'Special Shippment',
				'value' => 12000,
				'sign' => 1,
				'value_type' => 0,
				'is_copon' => 0,
				'code' => null,
				'activated' => 1,
				'user_id' => null,
			],
			[
				'title' => 'Tax',
				'value' => 2,
				'sign' => 1,
				'value_type' => 1,
				'is_copon' => 0,
				'code' => null,
				'activated' => 0,
				'user_id' => null,
			],
			[
				'title' => 'Pack cost',
				'value' => 1000,
				'sign' => 1,
				'value_type' => 0,
				'is_copon' => 0,
				'code' => null,
				'activated' => 0,
				'user_id' => null,
			],
		];

		foreach ($tagends as $tagend) {
			Tagend::updateOrCreate([
				'title' => $tagend['title'],
			], $tagend);
		}
	}
}
