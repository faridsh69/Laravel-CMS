<?php

use App\Models\Page;
use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    public function run()
    {
    	$pages = [
            [
            	'title' => 'Home',
            	'url' => null,
            	'content' => null,
            	'description' => 'Home page description',
            	'activated' => 1,
            	'google_index' => 1,
            ],
            [
            	'title' => 'About',
            	'url' => 'about',
            	'content' => '<h1>Contact Us</h1>',
            	'description' => 'About page description',
            	'activated' => 1,
            	'google_index' => 1,
            ],
            [
            	'title' => 'Contact',
            	'url' => 'contact',
            	'content' => '<h1>Contact Us</h1>',
            	'description' => 'Contact page description',
            	'activated' => 1,
            	'google_index' => 1,
            ],
            [
                'title' => 'Job',
                'url' => 'job',
                'content' => null,
                'description' => 'Job page description',
                'activated' => 1,
                'google_index' => 1,
            ],
        ];

        foreach($pages as $page){
            $page['language'] = 'en';
            Page::firstOrCreate(
                ['url' => $page['url']],
                $page
            );
        }
    }
}
