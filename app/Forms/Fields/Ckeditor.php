<?php

namespace App\Forms\Fields;

use Kris\LaravelFormBuilder\Fields\FormField;

class Ckeditor extends FormField
{
    public function render(array $options = [], $showLabel = true, $showField = true, $showError = true)
    {
        return parent::render($options, $showLabel, $showField, $showError);
    }

    protected function getTemplate()
    {
        return 'vendor.laravel-form-builder.ckeditor';
    }
}
