<?php

use Illuminate\Database\Seeder;
use App\Models\Feedback;

class DefaultFeedbacksTableSeeder extends Seeder
{
    public function run()
    {
        $database_name = config('database.connections.mysql.database');
        $folder_name = substr($database_name, 9, 6);
        $image_folder_name = '/storage/photos/shares/' . $folder_name . '/';
        $feedbacks = [
            [
            	'id' => 1,
            	'title' => '#13 Customer',
            	'full_name' => 'Eric Ez',
            	'description' => '“ I love this business! ”',
            	'image' => $image_folder_name . '8-feedback-1.png',
            	'activated' => 1,
            ],
            [
                'id' => 2,
                'title' => 'Manager',
                'full_name' => 'Navid Ma',
                'description' => '“ I love this business! ”',
                'image' => $image_folder_name . '8-feedback-2.png',
                'activated' => 1,
            ],
            [
                'id' => 3,
                'title' => '#4 Customer',
                'full_name' => 'Farima El',
                'description' => '“ I love this business! ”',
                'image' => $image_folder_name . '8-feedback-3.png',
                'activated' => 1,
            ],
            [
            	'id' => 4,
            	'title' => 'Chief Technology Officer',
            	'full_name' => 'Farid Sh',
            	'description' => '“ I love this business! ”',
            	'image' => $image_folder_name . '8-feedback-4.png',
            	'activated' => 1,
            ],
        ];

        foreach($feedbacks as $feedback){
            Feedback::updateOrCreate(['id' => $feedback['id']], $feedback);
        }
    }
}
