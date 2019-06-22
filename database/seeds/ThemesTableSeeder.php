<?php

use Illuminate\Database\Seeder;
use App\Models\Theme;

class ThemesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
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
        ];
        
        foreach($themes as $theme){
            Theme::updateOrCreate(['id' => $theme['id']], $theme);
        }
    }
}
