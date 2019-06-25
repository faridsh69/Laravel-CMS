<?php

use Illuminate\Database\Seeder;
use App\Models\Theme;

class ShopProductsTableSeeder extends Seeder
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
            	'title' => 'menew',
                'description' => 'menew custome theme',
            	'activated' => 1,
            ],
        ];
        
        foreach($themes as $theme){
            Theme::updateOrCreate(['id' => $theme['id']], $theme);
        }
    }
}
