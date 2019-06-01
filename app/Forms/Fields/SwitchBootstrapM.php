<?php

namespace App\Forms\Fields;

use Kris\LaravelFormBuilder\Fields\FormField;

class SwitchBootstrapM extends FormField
{
    /**
     * @inheritdoc
     */
    public function getDefaults()
    {
        return [
            'attr' => [
                'class' => null, 
                'id' => $this->getName(), 
                'data-switch' => 'true',
                'data-on-text' => 'Enabled', 
                'data-off-text' => 'Disabled',
            ],
            'value' => 1,
            'checked' => true,
        ];
    }

    public function render(array $options = [], $showLabel = true, $showField = true, $showError = true)
    {
        if($this->parent->getModel())
        {
            $model_value = $this->getModelValueAttribute($this->parent->getModel(), $this->name);
            if($model_value === 0)
            {
                $options['checked'] = false;
            }
        }
        $options['attr']['data-on-text'] = $this->options['choices'][0];
        $options['attr']['data-off-text'] = $this->options['choices'][1];
        
        return parent::render($options, $showLabel, $showField, $showError);
    }

    protected function getTemplate()
    {
        return 'vendor.laravel-form-builder.switch-bootstrap-m';
    }
}
