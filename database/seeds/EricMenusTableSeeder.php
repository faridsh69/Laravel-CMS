<?php

use App\Models\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $menus = [
            [
                'id' => 1,
                'title' => 'Home Solar',
            ],
            [
                'id' => 2,
                'title' => 'Business Solar',
            ],
            [
                'id' => 3,
                'title' => 'Services',
                'children' => [
                    ['id' => 4, 'title' => 'Solar Panel Installation'],
                    ['id' => 5, 'title' => 'Repairs & Add-Ons'],
                    ['id' => 6, 'title' => 'Maintenance Service'],
                    ['id' => 7, 'title' => 'Referral Program'],
                ],
            ],
            [
                'id' => 8,
                'title' => 'Benefits of Solar',
                'children' => [
                    ['id' => 9, 'title' => 'Benefits of Solar'],
                    ['id' => 10, 'title' => 'Rebates & Tax Credits'],
                ],
            ],
            [
                'id' => 11,
                'title' => 'Case Studies',
                'children' => [
                    ['id' => 12, 'title' => 'Livermore Home'],
                    ['id' => 13, 'title' => 'Fremont Cadillac'],
                    ['id' => 14, 'title' => 'Chevy Dublin'],
                    ['id' => 15, 'title' => 'ARCO'],
                    ['id' => 16, 'title' => 'United Duralume Products'],
                ],
            ],
            [
                'id' => 17,
                'title' => 'Areas Served',
                'children' => [
                    ['id' => 18, 'title' => 'Concord'],
                    ['id' => 19, 'title' => 'Livermore'],
                    ['id' => 20, 'title' => 'Lodi'],
                    ['id' => 21, 'title' => 'Manteca'],
                    ['id' => 22, 'title' => 'Oakdale'],
                    ['id' => 23, 'title' => 'San Jose'],
                    ['id' => 24, 'title' => 'Stockton'],
                ],
            ],
            [
                'id' => 25,
                'title' => 'Learn More',
                'children' => [
                    ['id' => 26, 'title' => 'Contact Us'],
                    ['id' => 27, 'title' => 'About Us'],
                    ['id' => 28, 'title' => 'Reviews'],
                    ['id' => 29, 'title' => 'FAQ'],
                    ['id' => 30, 'title' => 'Blog'],
                ],
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
