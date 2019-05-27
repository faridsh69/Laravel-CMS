<?php

namespace App\Forms\Base;

use Kris\LaravelFormBuilder\Form;

class BaseForm extends Form
{
    public $columns;

    public function __construct()
    {
        $class_name = 'App\\Models\\' . $this->model_name;
        $model = new $class_name();
        $this->columns = $model->columns;
    }

    public function buildForm()
    {
    	$id = $this->model ? $this->model->id : 0;

        $this->addTop();

        foreach($this->columns as $column)
        {
            $name = $column['name'];
            $type = isset($column['type']) ? $column['type'] : '';
            $rule = isset($column['rule']) ? $column['rule'] : '';
            $relation = isset($column['relation']) ? $column['relation'] : '';
            $validation = isset($column['validation']) ? $column['validation'] : '';
            $help = isset($column['help']) ? $column['help'] : ' ';

            if($relation){
                continue;
            }
            $input_type = 'text-m';
            if($name === 'short_content'){
                $input_type = 'textarea';
            }
            elseif($type === 'text'){
                $input_type = 'ckeditor';
            }
            elseif($type === 'boolean'){
                $input_type = 'switch-m';
            }

            if($rule === 'unique'){
                $validation .= $id;
            }
            $this->add($column['name'], $input_type, [
            	'rules' => $validation,
            	'help_block' => [
			        'text' => $help,
			    ],
            ]);
        }

        $this->addBottom();

        $this->add('submit', 'submit');
    }

    public function addTop()
    {
    }

    public function addBottom()
    {
    }
}
