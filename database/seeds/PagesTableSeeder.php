<?php

use App\Models\Page;
use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    public function run()
    {
    	$pages = [
            [
            	'id' => 1,
            	'title' => 'Home',
            	'url' => null,
            	'content' => '',
            	'description' => '',
            	'activated' => 1,
            	'google_index' => 1,
            ],
            [
            	'id' => 2,
            	'title' => 'About Us',
            	'url' => 'about-us',
            	'content' => '<h1>About Us</h1>',
            	'description' => 'description about about us page',
            	'activated' => 1,
            	'google_index' => 1,
            ],
            [
            	'id' => 3,
            	'title' => 'Products',
            	'url' => 'product',
            	'content' => '<h1>Products</h1>',
                'description' => 'description about Services page',
            	'view_code_url' => 'front.components.product.index',
            	'activated' => 1,
            	'google_index' => 1,
            ],
            [
                'id' => 4,
                'title' => 'Blog',
                'url' => 'blog',
                'content' => '<h1>Blog</h1>',
                'description' => 'description about BLOGS page',
                'activated' => 1,
                'google_index' => 1,
            ],
            [
            	'id' => 5,
            	'title' => 'Contact Us',
            	'url' => 'contact-us',
            	'content' => '<h1>Contact Us</h1>',
            	'description' => 'description about contact us page',
            	'activated' => 1,
            	'google_index' => 1,
            ],
            [
                'id' => 6,
                'title' => 'Basket',
                'url' => 'basket',
                'description' => 'description about basket page',
                'activated' => 1,
                'google_index' => 1,
            ],
        ];

        foreach($pages as $page){
            $page['language'] = config('app.locale');
            Page::updateOrCreate(['id' => $page['id']], $page);
        }
    }
}
