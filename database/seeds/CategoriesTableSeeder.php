<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $shops = [
            [
                'title' => 'Books',
                'children' => [
                    [    
                        'title' => 'Comic Book',
                        'children' => [
                            ['title' => 'Marvel Comic Book'],
                            ['title' => 'DC Comic Book'],
                            ['title' => 'Action comics'],
                        ],
                    ],
                    [    
                        'title' => 'Textbooks',
                        'children' => [
                            ['title' => 'Business'],
                            ['title' => 'Finance'],
                            ['title' => 'Computer Science'],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Electronics',
                'children' => [
                    [
                        'title' => 'TV',
                        'children' => [
                            ['title' => 'LED'],
                            ['title' => 'Blu-ray'],
                        ],
                    ],
                    [
                        'title' => 'Mobile',
                        'children' => [
                            ['title' => 'Samsung'],
                            ['title' => 'iPhone'],
                            ['title' => 'Xiomi'],
                        ],
                    ],
                ],
            ],
        ];
        foreach($shops as $shop)
        {
            if(!Category::first()){
                Category::create($shop);
                $categories = Category::get();
                foreach($categories as $category)
                {
                    $category->activated = 1;
                    $category->save();
                }
            }
        }
        // $node = new Category(['name' => 'root']);
        // $node->save(); // Saved as root

        // Category::create('root');
        // $node = Category::create([
        //     'title' => 'Foo',
        //     'children' => [
        //         [
        //             'name' => 'Bar',

        //             'children' => [
        //                 [ 'name' => 'Baz' ],
        //             ],
        //         ],
        //     ],
        // ]);

        // Category::create($attributes); // Saved as root
        // Category::create($attributes, $parent);

        // $node = new Category($attributes);
        // $node->save(); // Saved as root

        // $node->appendToNode($parent)->save();
        // $parent->appendNode($node);

        // # Explicit save
        // $node->afterNode($neighbor)->save();
        // $node->beforeNode($neighbor)->save();

        
        // Category::rebuildTree($data);
        // Category::rebuildSubtree($root, $data);

        // $bool = $node->down();
        // $bool = $node->up();

        // // Shift node by 3 siblings
        // $bool = $node->down(3);



        // $nodes = Category::get()->toTree();

        // $traverse = function ($categories, $prefix = '-') use (&$traverse) {
        //     foreach ($categories as $category) {
        //         echo PHP_EOL.$prefix.' '.$category->name;

        //         $traverse($category->children, $prefix.'-');
        //     }
        // };

        // $traverse($nodes);



     //    $categories = [
     //    	[
     //    		'id' => 1,
	    //     	'name' => 'category 1',
	    //     	'parent_id' => '0',
     //    	],
     //    	[
     //    		'id' => 2,
	    //     	'name' => 'category 2',
	    //     	'parent_id' => '0',
     //    	],
     //    	[
     //    		'id' => 3,
	    //     	'name' => 'sub category 1-1',
	    //     	'parent_id' => '1',
     //    	],
     //    ];

    	// foreach($categories as $category)
    	// {
     //    	Category::updateOrCreate(['id' => $category['id']], $category);
    	// }
    }
}
