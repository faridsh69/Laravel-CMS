<?php

namespace App\Forms\Base;

use Kris\LaravelFormBuilder\Form;

class BaseForm extends Form
{
    public $columns;

    public function __construct()
    {
        $class_name = 'App\\Models\\' . $this->model_name;
        $model = new $class_name;
        $this->columns = $model->columns;
    }

    public function buildForm()
    {
    	$id = $this->model ? $this->model->id : 0;

        foreach($this->columns as $column)
        {
            $name = $column['name'];
            $type = isset($column['type']) ? $column['type'] : '';
            $rule = isset($column['rule']) ? $column['rule'] : '';
            $relation = isset($column['relation']) ? $column['relation'] : '';
            $validation = isset($column['validation']) ? $column['validation'] : '';
            $help = isset($column['help']) ? $column['help'] : null;

            if($relation){
                continue;
            }
            $input_type = 'text-m';
            if($name == 'short_content'){
                $input_type = 'textarea';
            }
            elseif($type == 'text'){
                $input_type = 'ckeditor';
            }
            elseif($type == 'boolean'){
                $input_type = 'switch-m';
            }

            if($rule == 'unique'){
                $validation = $validation . $id;
            }
            $this->add($column['name'], $input_type, [
            	'rules' => $validation,
            	'help_block' => [
			        'text' => $help,
			    ],
            ]);
        }

        if($this->model_name == 'Blog')
        {
            $this->add('tags', 'entity', [
                'class' => 'Conner\Tagging\Model\Tag',
                'property' => 'name',
                'property_key' => 'id',
                'attr' => ['multiple' => 'true', 'class' => 'form-control m-bootstrap-select m-bootstrap-select--pill m-bootstrap-select--air m_selectpicker', 'data-live-search' => 'true'],
            ]);
        }
        $this->add('submit', 'submit');
    }
}
