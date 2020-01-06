<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

class BitcointProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
        	[
        		'title' => 'Toman',
        		'price' => '1',
        	],
        	[
        		'title' => 'Teter USDT erc20',
        		'price' => '13800',
        	],
        	[
        		'title' => 'Eteriom',
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
        		'title' => 'Voucher Perfect money',
        		'price' => '10390',
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
        		'title' => 'Light Coin',
        		'price' => '3800',
        	],
        	[
        		'title' => 'Dogecoin',
        		'price' => '1200',
        	],
        ];

    	foreach($products as $product){
    		$product['content'] = '';
    		$product['category_id'] = 1;
            Product::firstOrCreate($product);
        }
    }
}
