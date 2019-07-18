<?php

use App\Models\Feature;
use Illuminate\Database\Seeder;

class ShopFeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    // title, description, icon, activated
        $features = [
            [
                'id' => 1,
                'title' => 'Easy To Use!',
                'icon' => 'ti-mobile',
                'description' => 'All data in one page!',
            ],
            [
                'id' => 2,
                'title' => 'Find Food Faster',
                'icon' => 'ti-money',
                'description' => 'Sort and filter the list and find your food!',
            ],
            [
                'id' => 3,
                'title' => 'Be Online With Us',
                'icon' => 'ti-settings',
                'description' => 'Every moment your menu is available!',
            ],
        ];

        foreach($features as $feature){
            Feature::updateOrCreate(['id' => $feature['id']], $feature);
        }
    }
}

