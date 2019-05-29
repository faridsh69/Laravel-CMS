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
        switch ($this->name) {
            case 'url':
                $options['left_icon'] = 'la-sitemap';
                break;
            case 'title':
                $options['left_icon'] = 'la-header';
                break;
            case 'keywords':
                $options['left_icon'] = 'la-key';
                break;
            case 'meta_image':
                $options['left_icon'] = 'la-image';
                break;
            case 'canonical_url':
                $options['left_icon'] = 'la-globe';
                break;
            case 'meta_description':
                $options['left_icon'] = 'la-bookmark';
                break;
        }

        return parent::render($options, $showLabel, $showField, $showError);
    }

    protected function getTemplate()
    {
        return 'vendor.laravel-form-builder.text-m';
    }
}
