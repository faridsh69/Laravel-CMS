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
            	'title' => 'capp',
                'description' => 'Colorlib app',
            	'activated' => 1,
            ],
            [
            	'id' => 2,
            	'title' => 'kanox',
                'description' => 'kanox',
            	'activated' => 0,
            ],
            [
            	'id' => 3,
            	'title' => 'stayhome',
                'description' => 'stayhome',
            	'activated' => 0,
            ],
            [
                'id' => 4,
                'title' => 'persian',
                'description' => 'persian',
                'activated' => 0,
            ],
        ];

        foreach($themes as $theme){
            Theme::updateOrCreate(['id' => $theme['id']], $theme);
        }
    }
}
