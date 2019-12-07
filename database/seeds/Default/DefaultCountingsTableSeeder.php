<?php

use Illuminate\Database\Seeder;
use App\Models\Counting;

class DefaultCountingsTableSeeder extends Seeder
{
    public function run()
    {
        $countings = [
            [
            	'id' => 1,
            	'title' => 'SOLD',
            	'number' => 1038,
            	'icon' => 'ion-arrow-down-a',
            	'activated' => 1,
            ],
            [
            	'id' => 2,
            	'title' => 'Happy Clients',
            	'number' => 339,
            	'icon' => 'ion-happy-outline',
            	'activated' => 1,
            ],
            [
            	'id' => 3,
            	'title' => 'Active Members',
            	'number' => 187,
            	'icon' => 'ion-person',
            	'activated' => 1,
            ],
            [
            	'id' => 4,
            	'title' => 'Satisfy Rate',
            	'number' => 97,
            	'icon' => 'ion-ios-star-outline',
            	'activated' => 1,
            ],
        ];

        foreach($countings as $counting){
            Counting::updateOrCreate(['id' => $counting['id']], $counting);
        }
    }
}
