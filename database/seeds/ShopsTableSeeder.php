<?php

use App\Models\Shop;
use Illuminate\Database\Seeder;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
    	$shops = [
    		[
    			'id' => 1,
                'full_name' => 'Khaleghian',
                'title' => 'Denja Bakery Café',
                'title_fa' => 'کافه نان دِنجا',
            	'url' => 'denja',
            	'email' => 'farid.sh69@gmail.com',
            	'logo' => 'images/shop-logo.png',
            	'favicon' => 'images/shop-logo.png',
            	'cover_image' => 'images/shop-logo.png',
            	'activated' => 1,
            	'address' => 'زعفرانیه ، مقدس اردبیلی ، مرکز خرید پالادیوم ، طبقه ۳M، جنب اسباب بازی فروشی ماتی‌لوس .',
            	'country' => 'Iran',
            	'city' => 'Tehran',
            	'postal_code' => '1001203004',
            	'mobile' => '09127786141',
            	'phone' => '09127786141',
            	'fax' => '09127786141',
            	'twitter' => 'denjabakerycafe',
            	'telegram' => 'denjabakerycafe',
            	'instagram' => 'denjabakerycafe',
            	'skype' => 'denjabakerycafe',
            	'description' => 'Denja description that will show in google search',
            	'meta_description' => 'Denja description',
            	'keywords' => 'Denja, coffee, bakery',
            	'content' => '<h1>Welcome To Denja Bakery Café</h1>',
                'theme_name' => 'denja',
                'theme_color' => '#d1aa4b',
                'open_time' => '0:00|23:59',
        	],
        	[
    			'id' => 2,
                'full_name' => 'Ehsan Mirabzade',
                'title' => 'Cinema Café',
            	'title_fa' => 'کافه سینما',
            	'url' => 'cinemacafe',
            	'email' => 'farid.sh69@gmail.com',
            	'logo' => 'images/shop-logo.png',
            	'favicon' => 'images/shop-logo.png',
            	'cover_image' => 'images/shop-logo.png',
            	'activated' => 1,
            	'address' => '‎خیابان ولیعصر، باغ‌فردوس، موزه‌سینما، کافه‌سینما',
            	'country' => 'Iran',
            	'city' => 'Tehran',
            	'postal_code' => '1001203004',
            	'mobile' => '02122756531',
            	'phone' => '02122756531',
            	'fax' => '02122756531',
            	'twitter' => 'cinemacafe_ir',
            	'telegram' => 'cinemacafe_ir',
            	'instagram' => 'cinemacafe_ir',
            	'skype' => 'cinemacafe_ir',
            	'description' => 'Cinema Coffee description that will show in google search',
            	'meta_description' => 'Cinema Coffee description',
            	'keywords' => 'Cinema, coffee',
            	'content' => '<h1>Welcome To Cinema Café</h1>',
                'theme_name' => 'denja',
                'theme_color' => '#d1aa4b',
                'open_time' => '0:00|23:59',
        	],
            [
                'id' => 3,
                'full_name' => 'Mr. gennaro',
                'title' => 'Gennaro',
                'title_fa' => 'جنارو',
                'url' => 'gennaro',
                'email' => 'farid.sh69@gmail.com',
            ],
            [
                'id' => 4,
                'full_name' => 'Mr. fano',
                'title' => 'Fano',
                'title_fa' => 'فانو',
                'url' => 'fano',
                'email' => 'farid.sh69@gmail.com',
            ],
            [
                'id' => 5,
                'full_name' => 'Mr. parla',
                'title' => 'Parla',
                'title_fa' => 'پارلا',
                'url' => 'parla',
                'email' => 'farid.sh69@gmail.com',
            ],
        ];

        foreach($shops as $shop){
            Shop::updateOrCreate(['id' => $shop['id']], $shop);
        }
    }
}
