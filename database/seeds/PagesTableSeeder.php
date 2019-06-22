<?php

use Illuminate\Database\Seeder;
use App\Models\Page;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$pages = [
            [
            	'id' => 1,
            	'title' => 'Home',
            	'url' => '/',
            	'content' => '<h1>HEADING 1 CMS</h1><h2>HEADING 2 CMS</h2>',
            	'meta_description' => 'description about home page',
            	'activated' => 1,
            	'google_index' => 1,
            	'meta_image' => '',
            ],
            [
            	'id' => 2,
            	'title' => 'About Us',
            	'url' => 'about-us',
            	'content' => '<h1>HEADING 1 CMS About us</h1><h2>HEADING 2 CMS About us</h2>',
            	'meta_description' => 'description about about us page',
            	'activated' => 1,
            	'google_index' => 1,
            	'meta_image' => '',
            ],
            [
            	'id' => 3,
            	'title' => 'Services',
            	'url' => 'services',
            	'content' => '<h1>HEADING 1 CMS Services</h1><h2>HEADING 2 CMS Services</h2>',
            	'meta_description' => 'description about Services page',
            	'activated' => 1,
            	'google_index' => 1,
            	'meta_image' => '',
            ],
            [
            	'id' => 4,
            	'title' => 'FAQ',
            	'url' => 'faq',
            	'content' => '<h1>HEADING 1 CMS FAQ</h1><h2>HEADING 2 CMS FAQ</h2>',
            	'meta_description' => 'description about FAQ page',
            	'activated' => 1,
            	'google_index' => 1,
            	'meta_image' => '',
            ],
            [
                'id' => 6,
                'title' => 'Blogs',
                'url' => 'blogs',
                'content' => '<h1>HEADING 1 CMS BLOGS</h1><h2>HEADING 2 CMS BLOGS</h2>',
                'meta_description' => 'description about BLOGS page',
                'activated' => 1,
                'google_index' => 1,
                'meta_image' => '',
            ],
            [
            	'id' => 5,
            	'title' => 'Contact Us',
            	'url' => 'contact-us',
            	'content' => '<h1>HEADING 1 CMS Contact us</h1><h2>HEADING 2 CMS Contact us</h2>',
            	'meta_description' => 'description about contact us page',
            	'activated' => 1,
            	'google_index' => 1,
            	'meta_image' => '',
            ],
        ];
        
        foreach($pages as $page){
            Page::updateOrCreate(['id' => $page['id']], $page);
        }
    }
}
