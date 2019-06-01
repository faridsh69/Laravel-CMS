<?php

namespace App\Forms\Fields;

use Kris\LaravelFormBuilder\Fields\FormField;

class CheckboxM extends FormField
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
        $model = $this->parent->getModel();
        if($model){
            if($model[$this->name] === 0){
                $options['checked'] = false;
            }
        }

        return parent::render($options, $showLabel, $showField, $showError);
    }

    protected function getTemplate()
    {
        return 'vendor.laravel-form-builder.checkbox-m';
    }
}
