<?php

use Illuminate\Database\Seeder;
use App\Models\Theme;

class ShopThemesTableSeeder extends Seeder
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
