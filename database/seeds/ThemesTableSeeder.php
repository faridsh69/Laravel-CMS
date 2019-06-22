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
            	'title' => 'ca',
            	'activated' => 1,
            ],
            [
            	'id' => 2,
            	'title' => 'va',
            	'activated' => 0,
            ],
            [
            	'id' => 3,
            	'title' => 'df',
            	'activated' => 0,
            ],
        ];
        
        foreach($themes as $theme){
            Theme::updateOrCreate(['id' => $theme['id']], $theme);
        }
    }
}
