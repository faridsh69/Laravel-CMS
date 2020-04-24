<?php

namespace App\Services;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Http\Controllers\Controller;
use Str;

class BaseAdminController extends Controller
{
    // for setting sections
    // public $section;

    // meta for admin pages
    public $meta = [
        'title' => 'Manager',
        'description' => 'Admin Panel Page For Full Features, Best UI-UX Cms.',
        'keywords' => '',
        'image' => '',
        'alert' => '',
        'link_route' => '/admin/dashboard',
        'link_name' => 'Dashboard',
        'search' => 0,
    ];

    public function __construct(Request $request, FormBuilder $form_builder)
    {
        // $this->meta['title'] = $this->model_slug. __('manager');

        // $this->model_name = Str::studly($this->model_slug);
        // $this->model_translated = __(Str::snake($this->model_name));


        // if($this->model_slug){
        //     $this->meta['title'] = __(strtolower($this->model . '_manager'));
        //     $this->model_namespance = 'App\\Models\\' . $this->model;
        //     $this->repository = new $this->model_namespance();
        //     $this->model_columns = $this->repository->getColumns();
        //     $this->repository = new $this->model_namespance();
        //     $this->section = strtolower(str_replace('Setting', '', $this->model));
        // }
        // $this->model_sm = lcfirst($this->model);
        // $this->model_form = 'App\\Forms\\' . $this->model . 'Form';
        // $this->request = $request;
        // $this->form_builder = $form_builder;
    }
}
