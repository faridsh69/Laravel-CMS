<?php

use App\Models\Feedback;
use Illuminate\Database\Seeder;

class FeedbacksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $feedbacks = [
        	    // title, full_name, content, image, activated

            [
            	'id' => 1,
            	'title' => 'Home',
            	'full_name' => '/',
            	'content' => '<h1>Welcome</h1>',
            	'image' => '',
            	'activated' => 1,
            ],
        ];

        foreach($feedbacks as $feedback){
            Feedback::updateOrCreate(['id' => $feedback['id']], $feedback);
        }
    }
}
