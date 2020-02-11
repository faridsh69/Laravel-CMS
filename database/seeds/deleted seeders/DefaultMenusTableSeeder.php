<?php

use App\Models\Menu;
use Illuminate\Database\Seeder;

class DefaultMenusTableSeeder extends Seeder
{
    public function run()
    {
        $menus = [
            [
                'id' => 1,
                'title' => 'Home',
                'url' => '/',
            ],
            [
                'id' => 2,
                'title' => 'About Us',
                'url' => 'about-us',
            ],
            [
                'id' => 3,
                'title' => 'Product',
                'url' => 'product',
            ],
            [
                'id' => 4,
                'title' => 'Blog',
                'url' => 'blog',
            ],
            [
                'id' => 5,
                'title' => 'Contact Us',
                'url' => 'contact-us',
            ],
        ];

        $this->saveTree($menus, null);
    }

}
