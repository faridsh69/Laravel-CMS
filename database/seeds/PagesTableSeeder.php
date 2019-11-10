<?php

use App\Models\Page;
use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
    	$pages = [
            [
            	'id' => 1,
            	'title' => 'Home',
            	'url' => '/',
            	'content' => '',
            	'description' => '',
            	'activated' => 1,
            	'google_index' => 1,
            	'image' => '',
            ],
            [
            	'id' => 2,
            	'title' => 'About Us',
            	'url' => 'about-us',
            	'content' => '<h1>About us</h1><h2>CMS About us details</h2>',
            	'description' => 'description about about us page',
            	'activated' => 1,
            	'google_index' => 1,
            	'image' => '',
            ],
            [
            	'id' => 3,
            	'title' => 'Services',
            	'url' => 'services',
            	'content' => '<h1>CMS Services</h1><h2>CMS Services</h2>',
            	'description' => 'description about Services page',
            	'activated' => 1,
            	'google_index' => 1,
            	'image' => '',
            ],
            [
            	'id' => 4,
            	'title' => 'FAQ',
            	'url' => 'faq',
            	'content' => '<h1>CMS FAQ</h1><h2>CMS FAQ</h2>',
            	'description' => 'description about FAQ page',
            	'activated' => 1,
            	'google_index' => 1,
            	'image' => '',
            ],
            [
                'id' => 6,
                'title' => 'Blog',
                'url' => 'blog',
                'content' => ' ',
                'description' => 'description about BLOGS page',
                'activated' => 1,
                'google_index' => 1,
                'image' => '',
            ],
            [
            	'id' => 5,
            	'title' => 'Contact Us',
            	'url' => 'contact-us',
            	'content' => '<h1>CMS Contact us</h1><h2>CMS Contact us</h2>',
            	'description' => 'description about contact us page',
            	'activated' => 1,
            	'google_index' => 1,
            	'image' => '',
            ],
        ];

        foreach($pages as $page){
            if(config('app.name') === 'eric'){
                $pages = collect($pages)->whereIn('id', [1,6])->toArray();
            }
            Page::updateOrCreate(['id' => $page['id']], $page);
        }
    }
}
