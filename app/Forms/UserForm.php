<?php

namespace App\Forms;

use App\Base\BaseForm;

class UserForm extends BaseForm
{
    public $model_name = 'User';

    public function addBottom()
    {
        $this->add('password_confirmation', 'text-m', [
        	'rules' => 'nullable',
        	'help_block' => [
		        'text' => 'Password should match confirm password.',
		    ],
        ]);
    }

    public function addTop()
    {
    }
}
