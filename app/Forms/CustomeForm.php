<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class CustomeForm extends Form
{
    public function buildForm()
    {
        $form = $this->getFormOptions()['form_model'];
        foreach($form->fields as $column)
        {
            $name = $column['title'];
            $type = $column['type'];
            $rule = $column['rules'];
            $form_type = $column['type'];
            $help = isset($column['help']) ? $column['help'] : ' ';
            $select_options = isset($column['options']) ? $column['options'] : ' ';

            $options = [
                'rules' => $rule,
                'help_block' => [
                    'text' => $help,
                ],
            ];
            if(explode('_', $form_type)[0] === 'upload'){
                $file_accept = explode('_', $form_type)[1];
                $form_type = 'file';
            }
            // default type for form input type is text-m
            $input_type = 'text-m';

            // boolean types are: 1- switch-m 2- switch-bootstrap-m 3- checkbox-m
            if($form_type === 'boolean'){
                $input_type = 'checkbox';
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
                $options['attr'] = ['type' => 'date', 'autocomplete' => 'off'];
            }
            elseif($form_type === 'time'){
                $options['attr'] = ['type' => 'time', 'autocomplete' => 'off'];
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
            elseif($form_type === 'select'){
                $input_type = 'select';
                $options['choices'] = explode('|', $select_options);
            }
            elseif($form_type === 'multiselect'){
                $input_type = 'select';
                $options['attr']['multiple'] = 'true';
                $options['choices'] = explode('|', $select_options);
            }
            elseif($form_type === 'file'){
                $options['file_accept'] = $file_accept;
                $input_type = 'file-upload';
                if($file_accept !== 'file'){
                    $options['attr']['accept'] = $file_accept . '/*';
                }
                if($this->model){
                    $options['files_src'] = $this->model->files_src($name);
                }else{
                    $options['files_src'] = json_encode([]);
                }
            }

            $this->add($name, $input_type, $options);
        }
        $this->add('submit', 'submit');
    }
}
