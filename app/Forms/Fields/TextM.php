<?php

namespace App\Forms\Fields;

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
        $field_icons = [
            'url' => 'la-sitemap',
            'title' => 'la-header',
            'keywords' => 'la-key',
            'meta_image' => 'la-image',
            'canonical_url' => 'la-globe',
            'meta_description' => 'la-bookmark',
            'email' => 'la-envelope-o',
            'first_name' => 'la-user',
            'last_name' => 'la-users',
            'mobile' => 'la-mobile-phone',
            'phone' => 'la-phone',
            'birth_date' => 'la-child',
            'website' => 'la-internet-explorer',
            'password' => 'la-lock',
            'password_confirmation' => 'la-unlock',
        ];
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
