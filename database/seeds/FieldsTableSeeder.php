<?php

use Illuminate\Database\Seeder;
use App\Models\Field;

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
                'title' => 'title',
            	'activated' => 1,
            	'order' => 1,
                'help' => 'Specify the input',
                'rules' => 'required|min:4|max:5',
            	'options' => '',
            	'required' => 1,
            ],
            [
                'type' => 'textarea',
                'title' => 'title',
            	'activated' => 1,
            	'order' => 1,
                'help' => 'Specify the input',
                'rules' => 'required|min:4|max:5',
            	'options' => '',
            	'required' => 1,
            ],
        ];

		'number' => 'number',
		'date' => 'date',
		'time' => 'time',
		'email' => 'email',
		'color' => 'color',
		'password' => 'password',
		'file' => 'file',
		'boolean' => 'boolean',
		'select' => 'select',
		'mulitselect' => 'mulitselect',

        foreach($fields as $field){
        	Field::firstOrCreate($field);
        }
    }
}
