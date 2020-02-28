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
                'title' => 'Full Name',
            	'order' => 0,
                'help' => 'Specify the input',
                'rules' => 'required|min:2|max:60',
            	'options' => '',
            	'activated' => 1,
            	'required' => 1,
            ],
            [
                'type' => 'textarea',
                'title' => 'Description',
            	'order' => 3,
                'help' => 'Specify the input',
                'rules' => 'required|min:4|max:191',
            	'options' => '',
            	'activated' => 1,
            	'required' => 1,
            ],
            [
                'type' => 'number',
                'title' => 'Salary',
            	'order' => 6,
                'help' => 'salary per year in K$',
                'rules' => 'required|numberic',
            	'options' => '',
            	'activated' => 1,
            	'required' => 1,
            ],
            [
                'type' => 'date',
                'title' => 'Date Of Start',
            	'order' => 9,
                'help' => 'Specify the input',
                'rules' => '',
            	'options' => '',
            	'activated' => 1,
            	'required' => 0,
            ],
            [
                'type' => 'time',
                'title' => 'Time Of Start',
            	'order' => 12,
                'help' => 'Specify the input',
                'rules' => '',
            	'options' => '',
            	'activated' => 1,
            	'required' => 0,
            ],
            [
                'type' => 'email',
                'title' => 'Email',
            	'order' => 15,
                'help' => 'Specify the input',
                'rules' => 'email',
            	'options' => '',
            	'activated' => 1,
            	'required' => 0,
            ],
            [
                'type' => 'color',
                'title' => 'Favorite Color',
            	'order' => 18,
                'help' => 'Specify the input',
                'rules' => 'email',
            	'options' => '',
            	'activated' => 1,
            	'required' => 0,
            ],
            [
                'type' => 'password',
                'title' => 'Password',
            	'order' => 21,
                'help' => 'Specify the input',
                'rules' => 'required',
            	'options' => '',
            	'activated' => 1,
            	'required' => 0,
            ],
            [
                'type' => 'boolean',
                'title' => 'Acivated',
            	'order' => 24,
                'help' => 'Specify the input',
                'rules' => '',
            	'options' => '',
            	'activated' => 1,
            	'required' => 0,
            ],
            [
                'type' => 'file',
                'title' => 'Profile Image',
            	'order' => 27,
                'help' => 'Specify the input',
                'rules' => 'required|image',
            	'options' => '',
            	'activated' => 1,
            	'required' => 0,
            ],
            [
                'type' => 'select',
                'title' => 'Category',
            	'order' => 30,
                'help' => 'Specify the input',
                'rules' => '',
            	'options' => 'Frontend|Backend|Full Stack',
            	'activated' => 1,
            	'required' => 0,
            ],
            [
                'type' => 'mulitselect',
                'title' => 'Tags',
            	'order' => 33,
                'help' => 'Specify the input',
                'rules' => '',
            	'options' => 'Manager|Junior|Senior|Full Time|Remote',
            	'activated' => 1,
            	'required' => 0,
            ],
        ];

        foreach($fields as $field){
        	Field::firstOrCreate($field);
        }

        $job_apply_form = Form::firstOrCreate([
        	'title' => 'Computer Software Job',
        	'description' => 'This job is a remote job and it is for growing company.',
        	'activated' => 1,
        	// 'authentication' => 1,
        	// 'captcha' => 1,
        ]);
        $job_apply_form->fields()->sync([
        	1,2,3,4,5,6,7,8,9,10,11,12
        ], true);
    }
}
