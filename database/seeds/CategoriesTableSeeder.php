<?php

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'title' => 'News',
            ],
            [
                'title' => 'Sport',
            ],
            [
                'title' => 'Social',
            ],
            [
                'title' => 'Politics',
            ],
        ];

        $order = 1;
        foreach($categories as $category){
            $category['language'] = 'en';
            $category['order'] = $order;
            $category['url'] = Str::slug($category['title']);
            Category::firstOrCreate($category);
            $order ++;
        }
    }
}
