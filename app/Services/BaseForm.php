<?php

namespace App\Services;

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
            $options = [
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
                $input_type = 'checkbox-m';
                if($form_type === 'switch-m'){
                    $input_type = 'switch-m';
                }
                elseif($form_type === 'switch-bootstrap-m'){
                    $input_type = 'switch-bootstrap-m';
                }
            }

            // for convert textarean to ckeditor
            elseif($form_type === 'ckeditor'){
                $input_type = 'textarea';
                $options['attr'] = ['ckeditor' => 'on'];
            }

            // create email type input
            elseif($form_type === 'email'){
                $options['attr'] = ['type' => 'email'];
            }
            // create password input
            elseif($form_type === 'password'){
                $options['attr'] = ['type' => 'password', 'autocomplete' => 'off'];
                $options['value'] = '';
            }
            elseif($form_type === 'date'){
                $options['attr'] = ['id' => 'datepicker', 'autocomplete' => 'off'];
            }
            elseif($form_type === 'time'){
                $options['attr'] = ['id' => 'timepicker', 'autocomplete' => 'off'];
            }
            elseif($form_type === 'number'){
                $options['attr'] = ['type' => 'number'];
            }
            elseif($form_type === 'color'){
                $input_type = 'color';
            }
            elseif($form_type === 'textarea'){
                $input_type = 'textarea';
                $options['attr'] = ['rows' => 3];
            }
            // create select from enum options
            elseif($form_type === 'enum'){
                $form_enum_class = $column['form_enum_class'];
                $enum_class_name = 'App\\Enums\\' . $form_enum_class;
                $enum_class =  new $enum_class_name();
                $options['choices'] = $enum_class::data;
                $input_type = 'select';
                $options['attr'] = ['class' => 'form-control m-bootstrap-select m-bootstrap-select--pill m-bootstrap-select--air m_selectpicker'];
            }
            // create option from a list of models item with specific attribute
            elseif($form_type === 'entity'){
                $input_type = 'entity';
                $options['class'] = $column['class'];
                $options['property'] = $column['property'];
                $options['property_key'] = $column['property_key'];
                $options['attr']['class'] = 'form-control m-bootstrap-select m-bootstrap-select--pill m-bootstrap-select--air m_selectpicker';
                $options['attr']['data-live-search'] = 'true';
                if($column['multiple'] === true){
                    $options['attr']['multiple'] = 'true';
                }
            }
            // all input files
            elseif($form_type === 'file'){
                $file_manager = isset($column['file_manager']) ? $column['file_manager'] : false;
                $file_accept = isset($column['file_accept']) ? $column['file_accept'] : 'file';
                $file_multiple = isset($column['file_multiple']) ? $column['file_multiple'] : false;

                $options['file_accept'] = $file_accept;
                if($file_manager === true){
                    $input_type = 'file-manager';
                    if($this->model && $this->model->{$name}){
                        $options['files_src'] = json_encode(explode(',', $this->model->{$name}));
                    }else{
                        $options['files_src'] = json_encode([]);
                    }
                } else {
                    $input_type = 'file-upload';
                    $options['attr']['multiple'] = $file_multiple;
                    if($file_accept !== 'file'){
                        $options['attr']['accept'] = $file_accept . '/*';
                    }
                    if($this->model){
                        $options['files_src'] = $this->model->files_src($name);
                    }else{
                        $options['files_src'] = json_encode([]);
                    }
                }
            }

            $this->add($name, $input_type, $options);
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
