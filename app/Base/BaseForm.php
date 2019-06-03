<?php

namespace App\Base;

use Kris\LaravelFormBuilder\Form;

class BaseForm extends Form
{
    public $columns;

    public $id;

    public function __construct()
    {
        $class_name = 'App\\Models\\' . $this->model_name;
        $model = new $class_name();
        $this->columns = $model->columns;
    }

    public function buildForm()
    {
    	$this->id = $this->model ? $this->model->id : 0;

        $this->addTop();

        foreach($this->columns as $column)
        {
            $name = $column['name'];
            $type = $column['type'];
            $rule = $column['rule'];
            $help = $column['help'];
            $database = $column['database'];
            $form_type = $column['form_type'];
            $relation = isset($column['relation']) ? $column['relation'] : '';
            $attr = null;
            $choices = null;

            if($help === ''){
                $help = ' ';
            }
            if($database === 'unique' || strpos($rule, 'unique') !== false){
                $rule .= $this->id;
            }

            if($name === 'status'){
                $rule = 'required|enum_value:' . \App\Enums\UserStatus::class;
                // dd($rule);
            }
            $option = [
                'rules' => $rule,
                'help_block' => [
                    'text' => $help,
                ]
            ];
            if($relation || $form_type === 'none'){
                continue;
            }
            $input_type = 'text-m';

            if($type === 'boolean'){
                $input_type = 'switch-m';
                if($form_type === 'checkbox'){
                    $input_type = 'checkbox-m';
                }
                elseif($form_type === 'switch-bootstrap-m'){
                    $input_type = 'switch-bootstrap-m';
                }
            }
            elseif($form_type === 'ckeditor'){
                $input_type = 'textarea';
                $option['attr'] = ['ckeditor' => 'on'];
            }
            elseif($form_type === 'email'){
                $option['attr'] = ['type' => 'email'];
            }
            elseif($form_type === 'password'){
                $option['attr'] = ['type' => 'password', 'autocomplete' => 'off'];
                $option['value'] = '';
            }
            elseif($form_type === 'date'){
                $option['attr'] = ['autocomplete' => 'off'];
            }
            elseif($form_type === 'textarea'){
                $input_type = 'textarea';
                $option['attr'] = ['rows' => 3];
            }
            
            $this->add($column['name'], $input_type, $option);
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
