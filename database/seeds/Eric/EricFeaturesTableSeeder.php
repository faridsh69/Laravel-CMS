<?php

use App\Models\Feature;
use Illuminate\Database\Seeder;

class EricFeaturesTableSeeder extends Seeder
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
                'title' => 'Call the Best!',
                'icon' => 'ti-mobile',
                'description' => 'Serving the Bay Area for 14 years!',
            ],
            [
                'id' => 2,
                'title' => 'Earn $400',
                'icon' => 'ti-money',
                'description' => 'When You Refer Another Customer!',
            ],
            [
                'id' => 3,
                'title' => 'Call Today',
                'icon' => 'ti-settings',
                'description' => 'To Get Tax Rebates Before It’s Too Late!',
            ],
        ];

        foreach($features as $feature){
            Feature::updateOrCreate(['id' => $feature['id']], $feature);
        }
    }
}

