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
	    // title, full_name, content, image, activated
        $feedbacks = [
            [
            	'id' => 1,
            	'title' => '#137 Customer',
            	'full_name' => 'Farimah El',
            	'content' => '“ The Synergy Team headed by Eric did a great job on our solar installation. They were very efficient and knowledgeable and Eric explained how everything works. Our Solar panels are up and producing electricity thanks to Synergy Power. ”',
            	'image' => asset('storage/files/shares/client3.jpg'),
            	'activated' => 1,
            ],
            [
            	'id' => 2,
            	'title' => 'Developer at Synergypower',
            	'full_name' => 'Farid Sh',
            	'content' => '“ I love to work for this company, because of they are professional and always make their customers and employees happy! ”',
            	'image' => asset('storage/files/shares/client1.jpg'),
            	'activated' => 1,
            ],
            [
            	'id' => 3,
            	'title' => '#348 Customer',
            	'full_name' => 'Raj L.',
            	'content' => '“ We are loving this every day lots of saving on our PG&E bill. Your customer service is excellent! ”',
            	'image' => asset('storage/files/shares/client2.jpg'),
            	'activated' => 1,
            ],
            [
            	'id' => 4,
            	'title' => 'Manager',
            	'full_name' => 'Eric',
            	'content' => '“ Solar is here to stay and we want to share this awesome technology with the world! Not only does solar power save you money, it saves the environment from nasty fossil fuels. Go green today. ”',
            	'image' => asset('storage/files/shares/client0.jpg'),
            	'activated' => 1,
            ],
        ];

        foreach($feedbacks as $feedback){
            Feedback::updateOrCreate(['id' => $feedback['id']], $feedback);
        }
    }
}
