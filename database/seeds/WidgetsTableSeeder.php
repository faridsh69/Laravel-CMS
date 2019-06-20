<?php

use Illuminate\Database\Seeder;
use App\Models\Widget;

class WidgetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $widgets = [
            [
            	'title' => '',
            	'url' => '',
            	'description' => '',
            	'content' => '',
            	'image' => '',
            	'activated' => 1,
            ]
        ];
        foreach($widgets as $widget){
        	for($i = 1;$i < 16; $i ++){
            	Widget::updateOrCreate(['id' => $i], $widget);
            }
        }
    }
}
