<?php

namespace App\Forms\Fields;

use Config;
use Kris\LaravelFormBuilder\Fields\FormField;

class TextM extends FormField
{
    public function getDefaults()
    {
        return [
            'left_icon' => 'la-clipboard',
            'right_icon' => 'la-check',
        ];
    }

    public function render(array $options = [], $showLabel = true, $showField = true, $showError = true)
    {
        $field_icons = Config::get('laravel-form-builder.field_icons');
        if(isset($field_icons[$this->name])){
            $options['left_icon'] = $field_icons[$this->name];
        }

        return parent::render($options, $showLabel, $showField, $showError);
    }

    protected function getTemplate()
    {
        return 'vendor.laravel-form-builder.text-m';
    }
}
