<?php

namespace App\Services;

use Kris\LaravelFormBuilder\Form;

class BaseForm extends Form
{
    use BaseCmsTrait;

    public int $id = 0;

    public function __construct()
    {
        if (!$this->modelName)
            $this->modelName = 'User';
        $modelNamespace = config('cms.config.models_namespace') . $this->modelName;
        $modelRepository = new $modelNamespace();
        $this->modelColumns = $modelRepository->getColumns();
    }

    public function buildForm()
    {
        if(isset($this->model->id)){
            $this->id = $this->model ? $this->model->id : 0;
        }
        $this->addTop();

        foreach($this->modelColumns as $column)
        {
            $name = $column['name'];
            $rule = isset($column['rule']) ? $column['rule'] : '';
            $form_type = isset($column['form_type']) ? $column['form_type'] : '';
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
            elseif($form_type === 'checkbox-m'){
                $input_type = 'checkbox-m';
            }
            elseif($form_type === 'switch-m'){
                $input_type = 'switch-m';
            }
            elseif($form_type === 'switch-bootstrap-m'){
                $input_type = 'switch-bootstrap-m';
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
            elseif($form_type === 'password'){
                $options['attr'] = ['type' => 'password', 'autocomplete' => 'off'];
                $options['value'] = '';
            }
            elseif($form_type === 'confirm_password'){
                $options['attr'] = ['autocomplete' => 'off'];
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
            elseif($form_type === 'phone'){
                $options['attr'] = ['placeholder' => '+4917...'];
            }
            elseif($form_type === 'textarea'){
                $input_type = 'textarea';
                $options['attr'] = ['rows' => 3];
            }
            elseif($form_type === 'captcha'){
                $input_type = 'captcha';
            }
            // create select from enum options
            elseif($form_type === 'enum'){
                $form_enum_class = $column['form_enum_class'];
                $enum_class_name = 'App\\Enums\\' . $form_enum_class;
                $enum_class =  new $enum_class_name();
                $options['choices'] = $enum_class::data;
                $input_type = 'select';
                $options['attr']['class'] = 'form-control m-bootstrap-select m-bootstrap-select--pill m-bootstrap-select--air m_selectpicker';
                $options['attr']['data-live-search'] = 'true';
                if(isset($column['multiple']) && $column['multiple'] === true){
                    $options['attr']['multiple'] = 'true';
                }
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
                }else{
                    $options['empty_value'] = 'Nothing selected';
                }
                if(isset($column['query_builder'])){
                    $q = explode('|', $column['query_builder']);
                    $options['query_builder'] = function ($query) use ($q) {
                        return $query->where($q[0], $q[1]);
                    };
                }
            }
            // all input files
            elseif($form_type === 'file'){
                $file_manager = isset($column['file_manager']) ? $column['file_manager'] : false;
                $file_accept = isset($column['file_accept']) ? $column['file_accept'] : 'file';
                $file_multiple = isset($column['file_multiple']) ? $column['file_multiple'] : false;

                $options['file_accept'] = $file_accept;
                $options['srcs'] = [];
                if($this->model){
                    $options['srcs'] = $this->model->srcs($name);
                }
                if($file_manager === true){
                    $input_type = 'file-manager';
                } else {
                    $input_type = 'file-upload';
                    $options['attr']['multiple'] = $file_multiple;
                    if($file_accept !== 'file'){
                        $options['attr']['accept'] = $file_accept . '/*';
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
