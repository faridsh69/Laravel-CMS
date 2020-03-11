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
                'form_type' => 'text',
                'name' => 'full_name',
            	'order' => 0,
                'help' => 'Specify the input',
                'rule' => 'required|min:2|max:60',
            	'options' => '',
            	'activated' => 1,
            ],
            [
                'form_type' => 'textarea',
                'name' => 'Description',
            	'order' => 3,
                'help' => 'Specify the input',
                'rule' => 'required|min:4|max:191',
            	'options' => '',
            	'activated' => 1,
            ],
            [
                'form_type' => 'number',
                'name' => 'Salary',
            	'order' => 6,
                'help' => 'salary per year in K$',
                'rule' => 'required|numeric',
            	'options' => '',
            	'activated' => 1,
            ],
            [
                'form_type' => 'date',
                'name' => 'start_date',
            	'order' => 9,
                'help' => 'Specify the date to can start',
                'rule' => '',
            	'options' => '',
            	'activated' => 1,
            ],
            [
                'form_type' => 'time',
                'name' => 'start_time',
            	'order' => 12,
                'help' => 'Specify the time to can start',
                'rule' => '',
            	'options' => '',
            	'activated' => 1,
            ],
            [
                'form_type' => 'email',
                'name' => 'Email',
            	'order' => 15,
                'help' => 'Specify the email',
                'rule' => 'nullable|email',
            	'options' => '',
            	'activated' => 1,
            ],
            [
                'form_type' => 'color',
                'name' => 'Favorite Color',
            	'order' => 18,
                'help' => 'Specify the input',
                'rule' => 'email',
            	'options' => '',
            	'activated' => 1,
            ],
            [
                'form_type' => 'password',
                'name' => 'Password',
            	'order' => 21,
                'help' => 'Specify the input',
                'rule' => 'required',
            	'options' => '',
            	'activated' => 1,
            ],
            [
                'form_type' => 'boolean',
                'name' => 'Acivated',
            	'order' => 24,
                'help' => 'Specify the input',
                'rule' => '',
            	'options' => '',
            	'activated' => 1,
            ],
            [
                'form_type' => 'upload_file',
                'name' => 'document',
                'order' => 25,
                'help' => 'select a file',
                'rule' => 'nullable|file',
                'options' => '',
                'activated' => 1,
            ],
            [
                'form_type' => 'upload_image',
                'name' => 'profile_picture',
                'order' => 26,
                'help' => 'select an image',
                'rule' => 'nullable|image|mimetypes:image/*',
                'options' => '',
                'activated' => 1,
            ],
            [
                'form_type' => 'upload_video',
                'name' => 'post_clip',
                'order' => 27,
                'help' => 'select a video',
                'rule' => 'nullable|file|mimetypes:video/*',
                'options' => '',
                'activated' => 1,
            ],
            [
                'form_type' => 'upload_audio',
                'name' => 'music_audio',
                'order' => 28,
                'help' => 'select an audio',
                'rule' => 'nullable|file|mimetypes:audio/*',
                'options' => '',
                'activated' => 1,
            ],
            [
                'form_type' => 'select',
                'name' => 'category',
            	'order' => 30,
                'help' => 'Specify the input',
                'rule' => '',
            	'options' => 'Frontend|Backend|Full Stack',
            	'activated' => 1,
            ],
            [
                'form_type' => 'multiselect',
                'name' => 'Tags',
            	'order' => 33,
                'help' => 'Specify the input',
                'rule' => '',
            	'options' => 'Manager|Junior|Senior|Full Time|Remote',
            	'activated' => 1,
            ],
            [
                'form_type' => 'captcha',
                'name' => 'g-recaptcha-response',
                'order' => 99,
                'help' => '',
                'rule' => 'required|captcha',
                'options' => '',
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
            'block_id' => 23,
        ]);

        $fields = Field::get();
        $job_apply_form->fields()->sync($fields->take(4)->pluck('id')->toArray(), true);

        $blog_survey_form = Form::firstOrCreate([
            'title' => 'Blog Survey',
            'description' => 'What do you think about this website blogs.',
            'activated' => 1,
            'language' => 'en',
        	'block_id' => 24,
        ]);

        $blog_survey_form->fields()->sync([
            1,2
        ], true);
    }
}
