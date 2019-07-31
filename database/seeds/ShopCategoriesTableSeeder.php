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
        $shop_categories = [
            [
                'id' => 1,
                'title' => 'صبحانه',
                'image' => 'sausages.svg',
                'shop_id' => 1,
            ],
            [
                'id' => 2,
                'title' => 'پیش غذا',
                'image' => 'soup.svg',
                'shop_id' => 1,
            ],
            [
                'id' => 3,
                'title' => 'غذای اصلی',
                'image' => 'fast-food.svg',
                'shop_id' => 1,
            ],
            [
                'id' => 4,
                'title' => 'اسموتی و ماکتل',
                'image' => 'cocktail.svg',
                'shop_id' => 1,
            ],
            [
                'id' => 5,
                'title' => 'آبمیوه و شیک',
                'image' => 'fruit.svg',
                'shop_id' => 1,
            ],
            [
                'id' => 12,
                'title' => 'شیرینی ها',
                'image' => 'cupcake.svg',
                'shop_id' => 1,
            ],
            [
                'id' => 8,
                'title' => 'نوشیدنی و دسر',
                'image' => 'ice-cream.svg',
                'shop_id' => 1,
            ],
            [
                'id' => 7,
                'title' => 'دمنوش',
                'image' => 'coffee-cup.svg',
                'shop_id' => 1,
            ],
            [
                'id' => 6,
                'title' => 'قهوه',
                'image' => 'beer.svg',
                'shop_id' => 1,
            ],
            [
                'id' => 10,
                'title' => 'چای ارگانیک لاهیجان',
                'image' => 'vegan.svg',
                'shop_id' => 1,
            ],
            [
                'id' => 9,
                'title' => 'مخصوص دِنجا',
                'image' => 'cutlery.svg',
                'shop_id' => 1,
            ],
            [
                'id' => 11,
                'title' => 'تست',
                'image' => 'no.svg',
                'shop_id' => 1,
            ],

            // [
            //     'id' => 13,
            //     'title' => 'آرشیو مناسبتها',
            //     'image' => 'no.svg',
            //     'shop_id' => 1,
            // ],

            // cofe cinema
            [
                'id' => 14,
                'title' => 'صبحانه',
                'image' => 'sausages.svg',
                'shop_id' => 2,
            ],
            [
                'id' => 15,
                'title' => 'پیتزا',
                'image' => 'pizza2.svg',
                'shop_id' => 2,
            ],
            [
                'id' => 16,
                'title' => 'ساندویچ و پنینی',
                'image' => 'hamburger2.svg',
                'shop_id' => 2,
            ],
            [
                'id' => 17,
                'title' => 'گریل',
                'image' => 'steak2.svg',
                'shop_id' => 2,
            ],
            [
                'id' => 18,
                'title' => 'لازانیا و گراتین',
                'image' => 'cake2.svg',
                'shop_id' => 2,
            ],
            [
                'id' => 19,
                'title' => 'پلوی مخلوط',
                'image' => 'pot2.svg',
                'shop_id' => 2,
            ],
            [
                'id' => 20,
                'title' => 'پاستا',
                'image' => 'noodles2.svg',
                'shop_id' => 2,
            ],
            [
                'id' => 21,
                'title' => 'منوی روز',
                'image' => 'vegetarian-food2.svg',
                'shop_id' => 2,
            ],
            [
                'id' => 22,
                'title' => 'پیش غذا',
                'image' => 'salver2.svg',
                'shop_id' => 2,
            ],
            [
                'id' => 23,
                'title' => 'فیتنس',
                'image' => 'carrot2.svg',
                'shop_id' => 2,
            ],
            [
                'id' => 24,
                'title' => 'سوپ و سالاد',
                'image' => 'soup2.svg',
                'shop_id' => 2,
            ],
        ];

        $this->saveTree($shop_categories, null);
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
                    'image' => asset('images/icons/restaurant_pack/' . $category['image']),
                    'shop_id' => $category['shop_id'],
                    'order' => $order,
                    'description' => $category['title'],
                    'meta_description' => $category['title'],
                    'url' => Str::slug($category['title']),
                    'activated' => $category['id'] === 11 ? 0 : 1,
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


// INSERT INTO `folders` (`id`, `name`, `description`, `image`, `status`, `tag`, `level`, `parent_id`, `user_id`, `sort`, `created_at`, `updated_at`) VALUES
// (1, 'صبحانه', NULL, 'sausages.svg', 'incomplete', NULL, 'batch', NULL, NULL, 1, '2018-06-21 15:05:12', '2019-06-11 19:20:54'),
// (2, 'پیش غذا', NULL, 'soup.svg', 'Incomplete', NULL, 'batch', NULL, NULL, 2, '2019-03-09 12:56:54', '2019-06-11 19:20:54'),
// (3, 'غذای اصلی', NULL, 'fast-food.svg', 'Incomplete', NULL, 'batch', NULL, NULL, 3, '2019-03-09 12:59:40', '2019-06-11 19:20:54'),
// (4, 'اسموتی و ماکتل', NULL, 'cocktail.svg', 'Incomplete', NULL, 'batch', NULL, NULL, 4, '2019-03-09 13:00:06', '2019-06-11 19:20:54'),
// (5, 'آبمیوه و شیک', NULL, 'fruit.svg', 'Incomplete', NULL, 'batch', NULL, NULL, 5, '2019-03-09 13:05:49', '2019-06-11 19:20:54'),
// (6, 'قهوه', NULL, 'beer.svg', 'Incomplete', NULL, 'batch', NULL, NULL, 8, '2019-03-09 13:06:12', '2019-06-11 19:20:54'),
// (7, 'دمنوش', NULL, 'coffee-cup.svg', 'Incomplete', NULL, 'batch', NULL, NULL, 7, '2019-03-09 13:06:44', '2019-06-11 19:20:54'),
// (8, 'نوشیدنی و دسر', NULL, 'cupcake.svg', 'Incomplete', NULL, 'batch', NULL, NULL, 6, '2019-03-09 13:08:14', '2019-06-11 19:20:54'),
// (9, 'مخصوص دِنجا', NULL, 'cutlery.svg', 'Incomplete', NULL, 'batch', NULL, NULL, 0, '2019-03-09 13:10:32', '2019-06-11 19:20:54'),
// (10, 'چای ارگانیک لاهیجان', NULL, 'vegan.svg', 'Incomplete', NULL, 'batch', NULL, NULL, 9, '2019-03-10 08:53:29', '2019-06-11 19:20:54'),
// (12, 'شیرینی ها', NULL, NULL, 'Incomplete', NULL, 'batch', NULL, NULL, 10, '2019-05-14 07:44:08', '2019-06-11 19:20:54'),
// (11, 'تست', NULL, NULL, 'archive', NULL, 'batch', NULL, NULL, 10, '2019-04-20 15:39:28', '2019-04-21 14:18:19'),
// (13, 'آرشیو مناسبتها', NULL, NULL, 'Incomplete', NULL, 'batch', NULL, NULL, 11, '2019-05-31 07:01:10', '2019-06-11 19:20:54');



        // $types =[
     //     ['id' => 1, 'name' => 'پیتزا'],
     //     ['id' => 2, 'name' => 'سانویچ'],
     //        ['id' => 3, 'name' => 'سوخاری'],
     //        ['id' => 4, 'name' => 'برگر'],
     //        ['id' => 5, 'name' => 'نودل'],
     //        ['id' => 6, 'name' => 'گریل'],
     //        ['id' => 7, 'name' => 'مرغ بریان'],
     //        ['id' => 8, 'name' => 'استیک'],
     //        ['id' => 9, 'name' => 'پاستا'],
     //        ['id' => 10, 'name' => 'کباب'],
     //        ['id' => 11, 'name' => 'خورشت'],
     //        ['id' => 12, 'name' => 'دریایی'],
     //        ['id' => 13, 'name' => 'سنتی'],
     //        ['id' => 14, 'name' => 'محلی'],
     //        ['id' => 15, 'name' => 'پلویی'],
     //        ['id' => 16, 'name' => 'دیزی'],
     //        ['id' => 17, 'name' => 'گیلکی'],
     //        ['id' => 18, 'name' => 'خانگی'],
     //        ['id' => 19, 'name' => 'آسیایی'],
     //        ['id' => 20, 'name' => 'بشقاب'],
     //        ['id' => 21, 'name' => 'لازانیا'],
     //        ['id' => 22, 'name' => 'خوراک'],
     //        ['id' => 23, 'name' => 'صبحانه'],
     //        ['id' => 24, 'name' => 'کله‌پاچه'],
     //        ['id' => 25, 'name' => 'نان'],
     //        ['id' => 26, 'name' => 'بستنی'],
     //        ['id' => 27, 'name' => 'آب‌میوه'],
     //        ['id' => 28, 'name' => 'غذای اصلی'],
     //        ['id' => 29, 'name' => 'بین المللی'],
     //        ['id' => 30, 'name' => 'سالاد'],
     //        ['id' => 31, 'name' => 'دسر'],
     //        ['id' => 32, 'name' => 'پیش‌غذا'],
     //        ['id' => 33, 'name' => 'نوشیدنی'],
        // ];

     //    $blog_categories = [
     //        [
     //            'id' => 1,
     //            'title' => 'فست فود',
     //            'image' => '',
     //            'children' => [
     //                ['id' => 2, 'title' => 'پیتزا'],
     //                ['id' => 3, 'title' => 'سانویچ'],
     //                ['id' => 4, 'title' => 'سوخاری'],
     //                ['id' => 5, 'title' => 'برگر'],
     //            ],
     //        ],
     //    ];

        // $this->saveTree($blog_categories, null);
