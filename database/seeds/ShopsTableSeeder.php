<?php

use Illuminate\Database\Seeder;
use App\Models\Theme;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$shops = [
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

