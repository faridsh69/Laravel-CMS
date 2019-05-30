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
            $type = isset($column['type']) ? $column['type'] : '';
            $form_type = isset($column['form_type']) ? $column['form_type'] : '';
            $database = isset($column['database']) ? $column['database'] : '';
            $relation = isset($column['relation']) ? $column['relation'] : '';
            $rule = isset($column['rule']) ? $column['rule'] : '';
            $help = isset($column['help']) ? $column['help'] . ' ' : ' ';
            $attr = null;

            if($relation || $form_type === 'none'){
                continue;
            }
            $input_type = 'text-m';
            if($form_type === 'ckeditor'){
                $input_type = 'textarea';
                $attr = ['ckeditor' => '1'];
            }
            elseif($type === 'text' || $form_type === 'textarea'){
                $input_type = 'textarea';
                $attr = ['rows' => 3];
            }
            elseif($type === 'boolean'){
                if($form_type === 'checkbox'){
                    $input_type = 'checkbox-m';
                }else{
                    $input_type = 'switch-m';
                }
            }
            if($database === 'unique' || strpos($rule, 'unique') !== false){
                $rule .= $this->id;
            }
            $option = [
                'rules' => $rule,
                'help_block' => [
                    'text' => $help,
                ]
            ];
            if($attr){
                $option['attr'] = $attr;
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
