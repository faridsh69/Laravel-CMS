<?php

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $blog_categories = [
            [
                'id' => 1,
                'title' => 'News',
                'children' => [
                    ['id' => 2, 'title' => 'Sport'],
                    ['id' => 3, 'title' => 'Social'],
                    ['id' => 4, 'title' => 'Politics'],
                    [
                        'id' => 5,
                        'title' => 'World',
                    ],
                ],
            ],
        ];

        $this->saveTree($blog_categories, null);
    }

    public function saveTree($categories, $parent)
    {
        $order = 0;
        foreach($categories as $category)
        {
            $order ++;
            $node = Category::updateOrCreate(
                ['id' => $category['id']],
                [
                    'title' => $category['title'],
                    'url' => Str::slug($category['title']),
                    'order' => $order,
                    'activated' => 1,
                    'google_index' => 1,
                ]
            );

            if(isset($parent)){
                $parent->appendNode($node);
            }
            if(isset($category['children'])){
                $this->saveTree($category['children'], $node);
            }
        }
    }
}
