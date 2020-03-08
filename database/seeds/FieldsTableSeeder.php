<?php

use Illuminate\Database\Seeder;
use App\Models\Field;
use App\Models\Form;

class FieldsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$fields = [
            [
                'type' => 'text',
                'title' => 'full_name',
            	'order' => 0,
                'help' => 'Specify the input',
                'rules' => 'required|min:2|max:60',
            	'options' => '',
            	'activated' => 1,
            ],
            [
                'type' => 'textarea',
                'title' => 'Description',
            	'order' => 3,
                'help' => 'Specify the input',
                'rules' => 'required|min:4|max:191',
            	'options' => '',
            	'activated' => 1,
            ],
            [
                'type' => 'number',
                'title' => 'Salary',
            	'order' => 6,
                'help' => 'salary per year in K$',
                'rules' => 'required|numeric',
            	'options' => '',
            	'activated' => 1,
            ],
            [
                'type' => 'date',
                'title' => 'start_date',
            	'order' => 9,
                'help' => 'Specify the date to can start',
                'rules' => '',
            	'options' => '',
            	'activated' => 1,
            ],
            [
                'type' => 'time',
                'title' => 'start_time',
            	'order' => 12,
                'help' => 'Specify the time to can start',
                'rules' => '',
            	'options' => '',
            	'activated' => 1,
            ],
            [
                'type' => 'email',
                'title' => 'Email',
            	'order' => 15,
                'help' => 'Specify the email',
                'rules' => 'nullable|email',
            	'options' => '',
            	'activated' => 1,
            ],
            [
                'type' => 'color',
                'title' => 'Favorite Color',
            	'order' => 18,
                'help' => 'Specify the input',
                'rules' => 'email',
            	'options' => '',
            	'activated' => 1,
            ],
            [
                'type' => 'password',
                'title' => 'Password',
            	'order' => 21,
                'help' => 'Specify the input',
                'rules' => 'required',
            	'options' => '',
            	'activated' => 1,
            ],
            [
                'type' => 'boolean',
                'title' => 'Acivated',
            	'order' => 24,
                'help' => 'Specify the input',
                'rules' => '',
            	'options' => '',
            	'activated' => 1,
            ],
            [
                'type' => 'upload_file',
                'title' => 'document',
                'order' => 25,
                'help' => 'select a file',
                'rules' => 'nullable|file',
                'options' => '',
                'activated' => 1,
            ],
            [
                'type' => 'upload_image',
                'title' => 'profile_picture',
                'order' => 26,
                'help' => 'select an image',
                'rules' => 'nullable|image|mimetypes:image/*',
                'options' => '',
                'activated' => 1,
            ],
            [
                'type' => 'upload_video',
                'title' => 'post_clip',
                'order' => 27,
                'help' => 'select a video',
                'rules' => 'nullable|file|mimetypes:video/*',
                'options' => '',
                'activated' => 1,
            ],
            [
                'type' => 'upload_audio',
                'title' => 'music_audio',
                'order' => 28,
                'help' => 'select an audio',
                'rules' => 'nullable|file|mimetypes:audio/*',
                'options' => '',
                'activated' => 1,
            ],
            [
                'type' => 'select',
                'title' => 'category',
            	'order' => 30,
                'help' => 'Specify the input',
                'rules' => '',
            	'options' => 'Frontend|Backend|Full Stack',
            	'activated' => 1,
            ],
            [
                'type' => 'multiselect',
                'title' => 'Tags',
            	'order' => 33,
                'help' => 'Specify the input',
                'rules' => '',
            	'options' => 'Manager|Junior|Senior|Full Time|Remote',
            	'activated' => 1,
            ],
        ];

        foreach($fields as $field){
            $field['language'] = 'en';
        	Field::firstOrCreate($field);
        }

        $job_apply_form = Form::firstOrCreate([
        	'title' => 'Computer Software Job',
        	'description' => 'This job is a remote job and it is for growing company.',
            'activated' => 1,
        	'language' => 'en',
        ]);

        $job_apply_form->fields()->sync([
        	1,2,3,4,5,6,7,8,9,11,12,15,16,17,18
        ], true);
    }
}
