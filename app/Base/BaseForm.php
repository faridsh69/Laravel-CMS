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
        $this->columns = $model->getColumns();
    }

    public function buildForm()
    {
        if( isset($this->model->id) ){
            $this->id = $this->model ? $this->model->id : 0;
        }

        $this->addTop();

        foreach($this->columns as $column)
        {
            $name = $column['name'];
            $type = $column['type'];
            $rule = isset($column['rule']) ? $column['rule'] : null;
            $help = isset($column['help']) ? $column['help'] : ' ';
            $database = isset($column['database']) ? $column['database'] : null;
            $form_type = $column['form_type'];
            $relation = isset($column['relation']) ? $column['relation'] : '';
            $attr = null;
            $choices = null;

            // help
            if($help === ''){
                $help = ' ';
            }

            // rule
            if($database === 'unique' || strpos($rule, 'unique') !== false){
                $rule .= $this->id;
            }

            // options
            $option = [
                'rules' => $rule,
                'help_block' => [
                    'text' => $help,
                ]
            ];

            // type
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
            }elseif($form_type === 'enum'){
                $input_type = 'select';
                $option =  [
                    'choices' => \App\Enums\UserStatus::data,
                    'attr' => ['class' => 'form-control m-bootstrap-select m-bootstrap-select--pill m-bootstrap-select--air m_selectpicker'],
                ];
            }elseif($form_type === 'image'){
                $input_type = 'image';
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