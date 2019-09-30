<?php

use App\Models\Theme;
use Illuminate\Database\Seeder;

class ThemesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
    	$themes = [
            [
            	'id' => 1,
            	'title' => '1-original',
                'description' => 'Colorlib app',
            	'activated' => 1,
            ],
            [
            	'id' => 2,
            	'title' => '2-persian',
                'description' => 'persian',
            	'activated' => 1,
            ],
            [
            	'id' => 3,
            	'title' => '3-home',
                'description' => 'stayhome',
            	'activated' => 1,
            ],
            [
                'id' => 4,
                'title' => '4-windy',
                'description' => 'windy',
                'activated' => 1,
            ],
        ];

        foreach($themes as $theme){
            Theme::updateOrCreate(['id' => $theme['id']], $theme);
        }
    }
}
