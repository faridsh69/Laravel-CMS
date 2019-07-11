<?php

use Illuminate\Database\Seeder;
use App\Models\Counting;

class CountingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countings = [
            [
            	'id' => 1,
            	'title' => 'APP DOWNLOADS',
            	'number' => 180,
            	'icon' => 'ion-arrow-down-a',
            	'activated' => 1,
            ],
            [
            	'id' => 2,
            	'title' => 'Happy Clients',
            	'number' => 403,
            	'icon' => 'ion-person',
            	'activated' => 1,
            ],
            [
            	'id' => 3,
            	'title' => 'ACTIVE ACCOUNTS',
            	'number' => 130,
            	'icon' => 'ion-happy-outline',
            	'activated' => 1,
            ],
            [
            	'id' => 4,
            	'title' => 'TOTAL APP RATES',
            	'number' => 95,
            	'icon' => 'ion-ios-star-outline',
            	'activated' => 1,
            ],
        ];

        foreach($countings as $counting){
            Counting::updateOrCreate(['id' => $counting['id']], $counting);
        }
    }
}
