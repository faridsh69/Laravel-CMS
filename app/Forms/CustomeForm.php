<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class CustomeForm extends Form
{
    public function buildForm()
    {
    	$form = \App\Models\Form::language()->active()->first();
        foreach($form->fields as $column)
        {
            $name = $column['title'];
            $type = $column['type'];
            $rule = $column['rules'];
            $form_type = $column['type'];
            $help = isset($column['help']) ? $column['help'] : ' ';
            $options = isset($column['options']) ? $column['options'] : ' ';

            $option = [
                'rules' => $rule,
                'help_block' => [
                    'text' => $help,
                ],
            ];

            // default type for form input type is text-m
            $input_type = 'text-m';

            // boolean types are: 1- switch-m 2- switch-bootstrap-m 3- checkbox-m
            if($form_type === 'boolean'){
                $input_type = 'checkbox';
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
                $option['attr'] = ['type' => 'date', 'autocomplete' => 'off'];
            }
            elseif($form_type === 'time'){
                $option['attr'] = ['type' => 'time', 'autocomplete' => 'off'];
            }
            elseif($form_type === 'number'){
                $option['attr'] = ['type' => 'number'];
            }
            elseif($form_type === 'color'){
                $input_type = 'color';
            }
            elseif($form_type === 'textarea'){
                $input_type = 'textarea';
                $option['attr'] = ['rows' => 3];
            }
            elseif($form_type === 'select'){
                $input_type = 'select';
                $option['choices'] = explode('|', $options);
            }
            elseif($form_type === 'multiselect'){
                $input_type = 'select';
                $option['attr']['multiple'] = 'true';
                $option['choices'] = explode('|', $options);
            }
            elseif($form_type === 'file'){
                $input_type = 'file';
            }
            elseif($form_type === 'gallery'){
                $input_type = 'gallery';
            }

            $this->add($name, $input_type, $option);
        }
        $this->add('submit', 'submit');
    }
}
