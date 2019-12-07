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
                'title' => 'خانه',
                'url' => '/',
            ],
            [
                'id' => 2,
                'title' => 'درباره ما',
                'url' => 'about-us',
            ],
            [
                'id' => 3,
                'title' => 'خدمات',
                'url' => 'services',
            ],
            [
                'id' => 4,
                'title' => 'مقالات',
                'url' => 'blog',
            ],
            [
                'id' => 5,
                'title' => 'تماس با ما',
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
