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
            	'title' => 'خانه',
            	'url' => '',
            	'content' => '',
            	'description' => '',
            	'activated' => 1,
            	'google_index' => 1,
            ],
            [
            	'id' => 2,
            	'title' => 'درباره ما',
            	'url' => 'about-us',
            	'content' => '<h1>درباره ما</h1>',
            	'description' => 'description about about us page',
            	'activated' => 1,
            	'google_index' => 1,
            ],
            [
            	'id' => 3,
            	'title' => 'محصولات',
            	'url' => 'product',
            	'content' => '<h1>product</h1>',
                'description' => 'description about Services page',
            	'view_code_url' => 'front.components.product.index',
            	'activated' => 1,
            	'google_index' => 1,
            ],
            [
                'id' => 4,
                'title' => 'مقالات',
                'url' => 'blog',
                'description' => 'description about BLOGS page',
                'activated' => 1,
                'google_index' => 1,
            ],
            [
            	'id' => 5,
            	'title' => 'تماس با ما',
            	'url' => 'contact-us',
            	'content' => '<h1>تماس با ما</h1>',
            	'description' => 'description about contact us page',
            	'activated' => 1,
            	'google_index' => 1,
            ],
            [
                'id' => 6,
                'title' => 'سبد خرید',
                'url' => 'basket',
                'description' => 'description about basket page',
                'activated' => 1,
                'google_index' => 1,
            ],
            // [
            //  'id' => 4,
            //  'title' => 'FAQ',
            //  'url' => 'faq',
            //  'content' => '<h1>CMS FAQ</h1><h2>CMS FAQ</h2>',
            //  'description' => 'description about FAQ page',
            //  'activated' => 1,
            //  'google_index' => 1,
            // ],
        ];

        foreach($pages as $page){
            if(config('app.name') === 'eric'){
                $pages = collect($pages)->whereIn('id', [1, 6])->toArray();
            }
            Page::updateOrCreate(['id' => $page['id']], $page);
        }
    }
}
