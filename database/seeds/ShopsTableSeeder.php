<?php

use Illuminate\Database\Seeder;
use App\Models\Shop;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

open time , persian name , theme,  'کافه نان دِنجا' , 'Denja Bakery Café' , 09120338850
INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES

(46, 'theme', 'denja', NULL, NULL),
(47, 'theme_color', '#d1aa4b', NULL, NULL);



    	$shops = [
    		[
    			'id' => 1,
            	'title' => 'Denja Bakery Café',
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
        	],   
        	[
    			'id' => 2,
            	'title' => 'Cinema Café',
            	'url' => 'cinema',
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
        	],
        ];
        
        foreach($shops as $shop){
            Shop::updateOrCreate(['id' => $shop['id']], $shop);
        }
    }
}

