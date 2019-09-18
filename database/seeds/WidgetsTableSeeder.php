<?php

use App\Models\Widget;
use Illuminate\Database\Seeder;

class WidgetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $widgets = [
            [
                'id' => 1,
                'title' => 'menu',
            ],
            [
                'id' => 2,
                'title' => 'header',
            ],
            [
                'id' => 3,
                'title' => 'content',
            ],
            [
                'id' => 4,
                'title' => 'features',
            ],
            [
                'id' => 5,
                'title' => 'application',
            ],
            [
                'id' => 6,
                'title' => 'video',
            ],
            [
                'id' => 7,
                'title' => 'counting',
            ],
            [
                'id' => 8,
                'title' => 'products',
            ],
            [
                'id' => 9,
                'title' => 'pricing',
            ],
            [
                'id' => 10,
                'title' => 'feedback',
            ],
            [
                'id' => 11,
                'title' => 'subscribe',
            ],
            [
                'id' => 12,
                'title' => 'team',
            ],
            [
                'id' => 13,
                'title' => 'contact',
            ],
            [
                'id' => 14,
                'title' => 'footer',
            ],
            [
                'id' => 15,
                'title' => 'loading',
            ],
            [
                'id' => 16,
                'title' => 'learn',
            ],
            [
                'id' => 17,
                'title' => 'map',
            ],
        ];
        foreach($widgets as $widget){
            	Widget::updateOrCreate(['id' => $widget['id']], $widget);
        }
    }
}
