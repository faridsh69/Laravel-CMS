<?php

declare(strict_types=1);

namespace App\Cms\Services;

use App\Cms\Traits\CmsMainTrait;
use Kris\LaravelFormBuilder\Form as LaravelForm;

abstract class FormService extends LaravelForm
{
	use CmsMainTrait;

	public int $id = 0;

	public function __construct()
	{
		if (!$this->modelName) {
			$this->modelName = 'User';
		}
		$modelNamespace = config('cms.config.models_namespace') . $this->modelName;
		$modelRepository = new $modelNamespace();
		$this->modelColumns = $modelRepository->getColumns();
	}

	final public function buildForm(): void
	{
		$this->modelNamespace = config('cms.config.models_namespace') . $this->modelName;

		if (isset($this->model->id)) {
			$this->id = $this->model ? $this->model->id : 0;
		}
		$this->addTop();

		foreach ($this->modelColumns as $column) {
			$name = $column['name'];
			$rule = $column['rule'] ?? '';
			$form_type = $column['form_type'] ?? '';
			$help = $column['help'] ?? ' ';
			$database = $column['database'] ?? null;
			// if column is unique it will add id for edit mode
			if ($database === 'unique' || mb_strpos($rule, 'unique') !== false) {
				$rule .= $this->id;
			}

			// form options
			$options = [
				'rules' => $rule,
				'help_block' => [
					'text' => $help,
				],
			];

			// default type for form input type is text-m
			$input_type = 'text-m';

			// if it dosnt need to add field in form it will be none in columns
			if ($form_type === 'none') {
				continue;
			}
			if ($form_type === 'checkbox-m') {
				$input_type = 'checkbox-m';
			} elseif ($form_type === 'switch-m') {
				$input_type = 'switch-m';
			} elseif ($form_type === 'switch-bootstrap-m') {
				$input_type = 'switch-bootstrap-m';
			}

			// for convert textarean to ckeditor
			elseif ($form_type === 'ckeditor') {
				$input_type = 'textarea';
				$options['attr'] = [
					'ckeditor' => 'on',
				];
			}

			// create email type input
			elseif ($form_type === 'email') {
				$options['attr'] = [
					'type' => 'email',
				];
			} elseif ($form_type === 'password') {
				$options['attr'] = [
					'type' => 'password', 'autocomplete' => 'off',
				];
				$options['value'] = '';
			} elseif ($form_type === 'confirm_password') {
				$options['attr'] = [
					'autocomplete' => 'off',
				];
			} elseif ($form_type === 'date') {
				$options['attr'] = [
					'id' => 'datepicker', 'autocomplete' => 'off',
				];
			} elseif ($form_type === 'time') {
				$options['attr'] = [
					'id' => 'timepicker', 'autocomplete' => 'off',
				];
			} elseif ($form_type === 'number') {
				$options['attr'] = [
					'type' => 'number',
				];
			} elseif ($form_type === 'color') {
				$input_type = 'color';
			} elseif ($form_type === 'phone') {
				$options['attr'] = [
					'placeholder' => '+4917...',
				];
			} elseif ($form_type === 'textarea') {
				$input_type = 'textarea';
				$options['attr'] = [
					'rows' => 3,
				];
			} elseif ($form_type === 'captcha') {
				$input_type = 'captcha';
			}
			// create select from enum options
			elseif ($form_type === 'enum') {
				$form_enum_class = $column['form_enum_class'];
				$enum_class_name = 'App\\Enums\\' . $form_enum_class;
				$enum_class = new $enum_class_name();
				$options['choices'] = $enum_class::data;
				$input_type = 'select';
				$options['attr']['class'] = 'form-control m-bootstrap-select m-bootstrap-select--pill m-bootstrap-select--air m_selectpicker';
				$options['attr']['data-live-search'] = 'true';
				if (isset($column['multiple']) && $column['multiple'] === true) {
					$options['attr']['multiple'] = 'true';
				}
			}
			// create option from a list of models item with specific attribute
			elseif ($form_type === 'entity') {
				$input_type = 'entity';
				$options['class'] = $column['class'] ?? $this->modelNamespace;
				$options['property'] = $column['property'];
				$options['property_key'] = $column['property_key'];
				$options['attr']['class'] = 'form-control m-bootstrap-select m-bootstrap-select--pill m-bootstrap-select--air m_selectpicker';
				$options['attr']['data-live-search'] = 'true';
				if ($column['multiple'] === true) {
					$options['attr']['multiple'] = 'true';
				} else {
					$options['empty_value'] = 'Nothing selected';
				}
				if (isset($column['query_builder'])) {
					$q = explode('|', $column['query_builder']);
					$options['query_builder'] = fn ($query) => $query->where($q[0], $this->modelName);
				}
			}
			// all input files
			elseif ($form_type === 'file') {
				$input_type = 'file';
				$options['attr']['accept'] = $column['file_accept'] ?? 'image/*';
				$options['attr']['multiple'] = $column['file_multiple'] ?? false;

				// In creating mode
				$options['srcs'] = [];
				// In updating mode
				if ($this->model) {
					$options['srcs'] = $this->model->srcs($name);
				}
			}

			$this->add($name, $input_type, $options);
		}
		$this->addBottom();
		$this->add('submit', 'submit');
	}

	final public function addTop(): void
	{
	}

	final public function addBottom(): void
	{
	}
}
