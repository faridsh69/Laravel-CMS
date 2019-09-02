<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\User;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

class Test2Controller extends Controller
{
	public function getLoginUser(FormBuilder $form_builder)
	{
		$model_form = 'App\\Forms\\' . 'Pipe' . 'Form';
		$form = $form_builder->create($model_form, [
            'method' => 'POST',
            'url' => route('admin.user.list.store'),
            'class' => 'm-form m-form--state',
            'id' =>  'admin_form',
        ]);

        return view('front.test.pipe-login-user', ['form' => $form]);
	}
}