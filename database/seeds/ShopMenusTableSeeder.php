<?php

use App\Models\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ShopMenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $menus = [
            [
                'id' => 1,
                'title' => 'Home',
            ],
            [
                'id' => 2,
                'title' => 'About Us',
            ],
            [
            	'id' => 3,
            	'title' => 'Services',
            ],
            [
            	'id' => 4,
            	'title' => 'Blog',
            ],
            [
            	'id' => 5,
            	'title' => 'FAQ',
            ],
            [
                'id' => 6,
                'title' => 'Contact Us',
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
                    'url' => Str::slug($menu['title']),
                    'activated' => 1,
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
