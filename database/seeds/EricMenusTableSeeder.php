<?php

use App\Models\Menu;
use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EricMenusTableSeeder extends Seeder
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
                'url' => 'solar-for-homeowners',
            ],
            [
                'id' => 2,
                'title' => 'Business Solar',
                'url' => 'solar-for-business-owners',
            ],
            [
                'id' => 3,
                'title' => 'Services',
                'url' => 'solar-panel-installation',
                'children' => [
                    [
                        'id' => 4,
                        'title' => 'Solar Panel Installation',
                        'url' => 'solar-panel-installation',
                    ],
                    [
                        'id' => 5,
                        'title' => 'Repairs & Add-Ons',
                        'url' => 'panel-repairs-add-ons',
                    ],
                    [
                        'id' => 6,
                        'title' => 'Maintenance Service',
                        'url' => 'solar-panel-maintenance',
                    ],
                    [
                        'id' => 7, 
                        'title' => 'Referral Program',
                        'url' => 'referral-program',
                    ],
                ],
            ],
            [
                'id' => 8,
                'title' => 'Benefits of Solar',
                'url' => 'the-benefits-of-solar-power',
                'children' => [
                    [
                        'id' => 9, 
                        'title' => 'Benefits of Solar',
                        'url' => 'the-benefits-of-solar-power',
                    ],
                    [
                        'id' => 10, 
                        'title' => 'Rebates & Tax Credits',
                        'url' => 'solar-rebates-tax-credits',
                    ],
                ],
            ],
            [
                'id' => 11,
                'title' => 'Case Studies',
                'url' => 'livermore-home-case-study-2',
                'children' => [
                    [
                        'id' => 12, 
                        'title' => 'Livermore Home',
                        'url' => 'livermore-home-case-study-2',
                    ],
                    [
                        'id' => 13, 
                        'title' => 'Fremont Cadillac',
                        'url' => 'fremont-cadillac-case-study',
                    ],
                    [
                        'id' => 14, 
                        'title' => 'Chevy Dublin',
                        'url' => 'chevy-dublin-case-study',
                    ],
                    [
                        'id' => 15, 
                        'title' => 'ARCO',
                        'url' => 'arco-case-study-2',
                    ],
                    [
                        'id' => 16, 
                        'title' => 'United Duralume Products',
                        'url' => 'united-duralume-products-case-study',
                    ],
                ],
            ],
            [
                'id' => 17,
                'title' => 'Areas Served',
                'url' => 'concord-ca-solar-energy-systems',
                'children' => [
                    [
                        'id' => 18, 
                        'title' => 'Concord',
                        'url' => 'concord-ca-solar-energy-systems',
                    ],
                    [
                        'id' => 19, 
                        'title' => 'Livermore',
                        'url' => 'livermore-ca-solar-energy-systems',
                    ],
                    [
                        'id' => 20, 
                        'title' => 'Lodi',
                        'url' => 'lodi-ca-solar-energy-systems',
                    ],
                    [
                        'id' => 21, 
                        'title' => 'Manteca',
                        'url' => 'manteca-ca-solar-energy-systems',
                    ],
                    [
                        'id' => 22, 
                        'title' => 'Oakdale',
                        'url' => 'oakdale-ca-solar-energy-systems',
                    ],
                    [
                        'id' => 23, 
                        'title' => 'San Jose',
                        'url' => 'san-jose-ca-solar-energy-systems',
                    ],
                    [
                        'id' => 24, 
                        'title' => 'Stockton',
                        'url' => 'stockton-ca-solar-energy-systems',
                    ],
                ],
            ],
            [
                'id' => 25,
                'title' => 'Learn More',
                'url' => '',
                'children' => [
                    [
                        'id' => 26, 
                        'title' => 'Contact Us',
                        'url' => 'contact-us',
                    ],
                    [
                        'id' => 27, 
                        'title' => 'About Us',
                        'url' => 'about-our-solar-panel-company',
                    ],
                    [
                        'id' => 28, 
                        'title' => 'Reviews',
                        'url' => 'reviews',
                    ],
                    [
                        'id' => 29, 
                        'title' => 'FAQ',
                        'url' => 'faq',
                    ],
                    [
                        'id' => 30, 
                        'title' => 'Blog',
                        'url' => 'blog',
                    ],
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
                    'url' => $menu['url'],
                    'activated' => 1,
                ]
            );

            Page::updateOrCreate(
                ['url' => $menu['url']],
                [
                    'title' => $menu['title'],
                    'content' => 'It will add soon',
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
