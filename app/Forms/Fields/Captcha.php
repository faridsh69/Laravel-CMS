<?php

declare(strict_types=1);

namespace App\Forms\Fields;

use Kris\LaravelFormBuilder\Fields\FormField;

final class Captcha extends FormField
{
	public function render(array $options = [], $showLabel = true, $showField = true, $showError = true)
	{
		return parent::render($options, $showLabel, $showField, $showError);
	}

	protected function getTemplate()
	{
		return 'vendor.laravel-form-builder.captcha';
	}
}
