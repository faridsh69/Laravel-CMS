<?php

namespace App\Services;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

class BaseAdminController extends BaseListController
{
    // for setting sections
    public $section;

    // meta for admin pages
    public $meta = [
        'title' => 'Setting',
        'description' => 'Admin Panel Page For Best Cms In The World',
        'keywords' => '',
        'image' => '',
        'alert' => '',
        'link_route' => '/admin/dashboard',
        'link_name' => '',
        'search' => 0,
    ];

    public function __construct(Request $request, FormBuilder $form_builder)
    {
        $this->meta['link_name'] = __('dashboard');
        if($this->model){
            $this->meta['title'] = __(strtolower($this->model . '_manager'));
            $this->model_class = 'App\\Models\\' . $this->model;
            $this->repository = new $this->model_class();
            $this->model_columns = $this->repository->getColumns();
            $this->repository = new $this->model_class();
            $this->section = strtolower(str_replace('Setting', '', $this->model));
        }
        $this->model_sm = lcfirst($this->model);
        $this->model_form = 'App\\Forms\\' . $this->model . 'Form';
        $this->request = $request;
        $this->form_builder = $form_builder;
    }
}
