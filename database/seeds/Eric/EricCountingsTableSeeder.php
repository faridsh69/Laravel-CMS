<?php

use App\Models\Counting;
use Illuminate\Database\Seeder;

class EricCountingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    // title, number, icon, activated
        $countings = [
            [
            	'id' => 1,
            	'title' => 'Money Saved Overall',
            	'number' => 7269600,
            	'icon' => 'ion-happy-outline',
            	'activated' => 1,
            ],
            [
            	'id' => 2,
            	'title' => 'Customers Served',
            	'number' => 345,
            	'icon' => 'ion-person',
            	'activated' => 1,
            ],
            [
            	'id' => 3,
            	'title' => 'Solar Panels Installed',
            	'number' => 2662,
            	'icon' => 'ion-arrow-down-a',
            	'activated' => 1,
            ],
            [
            	'id' => 4,
            	'title' => 'Energy Produced (GWh)',
            	'number' => 36.35,
            	'icon' => 'ion-ios-star-outline',
            	'activated' => 1,
            ],
        ];

        foreach($countings as $counting){
            Counting::updateOrCreate(['id' => $counting['id']], $counting);
        }
    }
}
