<?php

use Illuminate\Database\Seeder;
use App\Models\Feedback;

class DefaultFeedbacksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $feedbacks = [
            [
            	'id' => 1,
            	'title' => '#13 Customer',
            	'full_name' => 'Eric Ez',
            	'content' => '“ I love this business! ”',
            	'image' => 'storage/files/shares/synergypower/client-4.jpg',
            	'activated' => 1,
            ],
            [
            	'id' => 2,
            	'title' => 'Chief Technology Officer',
            	'full_name' => 'Farid Sh',
            	'content' => '“ I love this business! ”',
            	'image' => 'images/front/themes/1-original/client-4.jpg',
            	'activated' => 1,
            ],
            [
            	'id' => 3,
            	'title' => '#4 Customer',
            	'full_name' => 'Farima El',
            	'content' => '“ I love this business! ”',
            	'image' => 'images/front/themes/1-original/client-3.jpg',
            	'activated' => 1,
            ],
            [
            	'id' => 4,
            	'title' => 'Manager',
            	'full_name' => 'Navid Ma',
            	'content' => '“ I love this business! ”',
            	'image' => 'images/front/themes/1-original/client-2.jpg',
            	'activated' => 1,
            ],
        ];

        foreach($feedbacks as $feedback){
            Feedback::updateOrCreate(['id' => $feedback['id']], $feedback);
        }
    }
}
