<?php

namespace App\Forms\Fields;

use Kris\LaravelFormBuilder\Fields\FormField;

class Gallery extends FormField
{
    public function render(array $options = [], $showLabel = true, $showField = true, $showError = true)
    {
		$options['attr']['multiple'] = true;
		$model = $this->parent->getModel();
		if($model){
			$options['images'] = $model->images->toArray();
		}else{
			$options['images'] = [];
		}

        return parent::render($options, $showLabel, $showField, $showError);
    }

    protected function getTemplate()
    {
        return 'vendor.laravel-form-builder.gallery';
    }
}
