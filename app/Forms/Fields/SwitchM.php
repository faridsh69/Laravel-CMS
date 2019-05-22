<?php

namespace App\Forms\Fields;

use Kris\LaravelFormBuilder\Fields\FormField;

class SwitchM extends FormField
{
    /**
     * @inheritdoc
     */
    public function getDefaults()
    {
        return [
            'attr' => ['class' => null, 'id' => $this->getName()],
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

        return parent::render($options, $showLabel, $showField, $showError);
    }

    protected function getTemplate()
    {
        return 'vendor.laravel-form-builder.switch-m';
    }
}
