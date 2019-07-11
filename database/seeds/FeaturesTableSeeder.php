<?php

use Illuminate\Database\Seeder;
use App\Models\Feature;

class FeaturesTableSeeder extends Seeder
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
                'title' => 'Easy to use',
                'icon' => 'ti-mobile',
                'description' => 'We build pretty complex tools and this allows us to take designs and turn them into functional quickly and easily',
            ],
            [
                'id' => 2,
                'title' => 'Powerful Design',
                'icon' => 'ti-money',
                'description' => 'We build pretty complex tools and this allows us to take designs and turn them into functional quickly and easily',
            ],
            [
                'id' => 3,
                'title' => 'Customizability',
                'icon' => 'ti-settings',
                'description' => 'We build pretty complex tools and this allows us to take designs and turn them into functional quickly and easily',
            ],
        ];

        foreach($features as $feature){
            Feature::updateOrCreate(['id' => $feature['id']], $feature);
        }
    }
}
