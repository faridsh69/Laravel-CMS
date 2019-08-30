<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Str;

class TestMenewController extends Controller
{
    public $model = 'Shop';

    public $model_sm = 'shop';

    public $model_form;

    public $model_class;

    public $model_columns;

    public $repository;

    public $request;

    public $form_builder;

    public function __construct(Request $request, FormBuilder $form_builder)
    {
        if(config('app.name') !== 'mmenew'){
            return 1;
        }

        $this->model_class = 'App\\Models\\' . $this->model;
        $this->form_builder = $form_builder;
        $this->request = $request;
        $this->model_form = 'App\\Forms\\' . $this->model . 'Form';
        $this->repository = new $this->model_class();
        $this->model_columns = $this->repository->getColumns();
    }

    public function getRegisterRestaurant()
    {
        $form = $this->form_builder->create($this->model_form, [
            'method' => 'POST',
            'url' => route('front.test.menew.post-register-restaurant'),
            'class' => 'm-form m-form--state',
            'id' =>  'admin_form',
        ]);

        return view('front.test.menew.register-restaurantnew', ['form' => $form]);
    }

    public function postRegisterRestaurant()
    {
        $form = $this->form_builder->create($this->model_form);

        if (! $form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }
        $data = $form->getFieldValues();
        unset($data['tags']);
        $data['url'] = Str::slug($data['title']);

        foreach(collect($this->model_columns)->where('type', 'boolean')->pluck('name') as $boolean_column)
        {
            if(! isset($data[$boolean_column]))
            {
                $data[$boolean_column] = 0;
            }
        }

        $this->repository->create($data);

        $this->request->session()->flash('alert-success', $this->model . ' Created Successfully!');
        // exec('php -q /home/faridsh/domains/subdomain/add_subdomain.php ' . $data['url']);

        return redirect()->route('front.test.menew.register-thank-you');
    }

    public function getRegisterThankYou()
    {
        return view('front.test.menew.register-thank-you');
    }
}
