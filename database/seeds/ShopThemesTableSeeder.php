<?php

use App\Models\Theme;
use Illuminate\Database\Seeder;

class ShopThemesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
    	$themes = [
            [
            	'id' => 4,
            	'title' => 'menew',
                'description' => 'menew custom theme',
            	'activated' => 1,
            ],
        ];

        foreach($themes as $theme){
            Theme::updateOrCreate(['id' => $theme['id']], $theme);
        }
    }
}
