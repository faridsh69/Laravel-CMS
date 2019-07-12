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
        if(isset($this->model->id)){
            $this->id = $this->model ? $this->model->id : 0;
        }
        // you can add another fields with define addTop function in form
        $this->addTop();

        foreach($this->columns as $column)
        {
            $name = $column['name'];
            $type = $column['type'];
            $rule = $column['rule'];
            $form_type = $column['form_type'];
            $help = isset($column['help']) ? $column['help'] : ' ';
            $database = isset($column['database']) ? $column['database'] : null;

            // if column is unique it will add id for edit mode
            if($database === 'unique' || strpos($rule, 'unique') !== false){
                $rule .= $this->id;
            }

            // form options 
            $option = [
                'rules' => $rule,
                'help_block' => [
                    'text' => $help,
                ],
            ];

            // default type for form input type is text-m 
            $input_type = 'text-m';

            // if it dosnt need to add field in form it will be none in columns
            if($form_type === 'none'){
                continue;
            }
            // boolean types are: 1- switch-m 2- switch-bootstrap-m 3- checkbox-m
            elseif($type === 'boolean'){
                $input_type = 'switch-m';
                if($form_type === 'checkbox'){
                    $input_type = 'checkbox-m';
                }
                elseif($form_type === 'switch-bootstrap-m'){
                    $input_type = 'switch-bootstrap-m';
                }
            }
            // for convert textarean to ckeditor 
            elseif($form_type === 'ckeditor'){
                $input_type = 'textarea';
                $option['attr'] = ['ckeditor' => 'on'];
            }
            // create email type input
            elseif($form_type === 'email'){
                $option['attr'] = ['type' => 'email'];
            }
            // create password input
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
            // create select from enum options
            elseif($form_type === 'enum'){
                if($this->model_name === 'User'){
                    $option['choices'] = \App\Enums\UserStatus::data;
                }
                elseif($this->model_name === 'Block'){
                    $option['choices'] = \App\Enums\BlockType::data;
                }
                $input_type = 'select';
                $option['attr'] = ['class' => 'form-control m-bootstrap-select m-bootstrap-select--pill m-bootstrap-select--air m_selectpicker'];
            }
            // create image file browser for select image
            elseif($form_type === 'image'){
                $input_type = 'image';
            }
            // create option from a list of models item with specific attribute
            elseif($form_type === 'entity'){
                $input_type = 'entity';
                $option['class'] = $column['class'];
                $option['property'] = $column['property'];
                $option['property_key'] = $column['property_key'];
                $option['attr']['class'] = 'form-control m-bootstrap-select m-bootstrap-select--pill m-bootstrap-select--air m_selectpicker';
                $option['attr']['data-live-search'] = 'true';
                if($column['multiple'] === true){
                    $option['attr']['multiple'] = 'true';
                }
            }

            $this->add($name, $input_type, $option);
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
