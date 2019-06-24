<?php

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ShopCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
    	$types =[
        	['id' => 1, 'name' => 'پیتزا'],
        	['id' => 2, 'name' => 'سانویچ'],
            ['id' => 3, 'name' => 'سوخاری'],
            ['id' => 4, 'name' => 'برگر'],
            ['id' => 5, 'name' => 'نودل'],
            ['id' => 6, 'name' => 'گریل'],
            ['id' => 7, 'name' => 'مرغ بریان'],
            ['id' => 8, 'name' => 'استیک'],
            ['id' => 9, 'name' => 'پاستا'],
            ['id' => 10, 'name' => 'کباب'],
            ['id' => 11, 'name' => 'خورشت'],
            ['id' => 12, 'name' => 'دریایی'],
            ['id' => 13, 'name' => 'سنتی'],
            ['id' => 14, 'name' => 'محلی'],
            ['id' => 15, 'name' => 'پلویی'],
            ['id' => 16, 'name' => 'دیزی'],
            ['id' => 17, 'name' => 'گیلکی'],
            ['id' => 18, 'name' => 'خانگی'],
            ['id' => 19, 'name' => 'آسیایی'],
            ['id' => 20, 'name' => 'بشقاب'],
            ['id' => 21, 'name' => 'لازانیا'],
            ['id' => 22, 'name' => 'خوراک'],
            ['id' => 23, 'name' => 'صبحانه'],
            ['id' => 24, 'name' => 'کله‌پاچه'],
            ['id' => 25, 'name' => 'نان'],
            ['id' => 26, 'name' => 'بستنی'],
            ['id' => 27, 'name' => 'آب‌میوه'],
            ['id' => 28, 'name' => 'غذای اصلی'],
            ['id' => 29, 'name' => 'بین المللی'],
            ['id' => 30, 'name' => 'سالاد'],
            ['id' => 31, 'name' => 'دسر'],
            ['id' => 32, 'name' => 'پیش‌غذا'],
            ['id' => 33, 'name' => 'نوشیدنی'],
    	];

        $blog_categories = [
            [
                'id' => 1,
                'title' => 'فست فود',
                'children' => [
                    ['id' => 2, 'title' => 'پیتزا'],
                    ['id' => 3, 'title' => 'سانویچ'],
                    ['id' => 4, 'title' => 'سوخاری'],
                    ['id' => 5, 'title' => 'برگر'], 
                ],
            ],
        ];

        $this->saveTree($blog_categories, null);
    }

    public function saveTree($categories, $parent)
    {
        foreach($categories as $category)
        {
            $node = Category::updateOrCreate(
                ['id' => $category['id']], 
                [
                    'title' => $category['title'],
                    'url' => Str::slug($category['title']),
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
