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

    public function saveTree($menus, $parent)
    {
        foreach($menus as $menu)
        {
            $node = Menu::updateOrCreate(
                ['id' => $menu['id']],
                [
                    'title' => $menu['title'],
                    'url' => $menu['url'],
                    'activated' => 1,
                    'language' => config('app.locale'),
                ]
            );

            if(isset($parent)){
                $parent->appendNode($node);
            }
            if(isset($menu['children'])){
                $this->saveTree($menu['children'], $node);
            }
        }
    }
}
