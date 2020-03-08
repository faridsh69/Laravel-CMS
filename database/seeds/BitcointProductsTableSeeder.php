<?php

use App\Models\Product;
use Illuminate\Database\Seeder;
use App\Models\Tagend;

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

        $order = 1;
    	foreach($products as $product){
            $order += 3;
            $product['order'] = $order;
            $product['url'] = '';
    		$product['content'] = '';
            $product['category_id'] = 1;
    		$product['discount_price'] = null;

            Product::firstOrCreate($product);
        }

        $tagends = [
            [
                'title' => 'ارسال معمولی',
                'description' => 'زمان ارسال بین ۱ الی ۲ روز است.',
                'value' => 8000,
                'sign' => 1,
                'type' => 0,
                'is_copon' => 0,
                'code' => null,
                'activated' => 1,
                'user_id' => null,
            ],
            [
                'title' => 'ارسال سفارشی',
                'description' => 'زمان ارسال کمتر از ۱ روز است.',
                'value' => 10000,
                'sign' => 1,
                'type' => 0,
                'is_copon' => 0,
                'code' => null,
                'activated' => 1,
                'user_id' => null,
            ],
            [
                'title' => 'ارسال با پیک موتوری',
                'description' => 'زمان ارسال تا ساعاتی دیگر',
                'value' => 12000,
                'sign' => 1,
                'type' => 0,
                'is_copon' => 0,
                'code' => null,
                'activated' => 1,
                'user_id' => null,
            ],
            [
                'title' => 'مالیات',
                'description' => 'مالیات برابر ۲ درصد می باشد.',
                'value' => 2,
                'sign' => 1,
                'type' => 1,
                'is_copon' => 0,
                'code' => null,
                'activated' => 0,
                'user_id' => null,
            ],
            [
                'title' => 'ارزش افزوده',
                'description' => 'ارزش افزوده برابر ۳ درصد می باشد.',
                'value' => 3,
                'sign' => 1,
                'type' => 1,
                'is_copon' => 0,
                'code' => null,
                'activated' => 0,
                'user_id' => null,
            ],
            [
                'title' => 'هزینه بسته بندی',
                'description' => 'هزینه بسته بندی هزار تومان است.',
                'value' => 1000,
                'sign' => 1,
                'type' => 0,
                'is_copon' => 0,
                'code' => null,
                'activated' => 0,
                'user_id' => null,
            ],
        ];

        foreach($tagends as $tagend){
            Tagend::updateOrCreate(['title' => $tagend['title']], $tagend);
        }
    }
}
