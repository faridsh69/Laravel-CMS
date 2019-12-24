<?php

namespace App\Base;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

class BaseAdminController extends Controller
{
    // public $model = 'Blog';
    public $model;

    // public $model_sm = 'blog';
    public $model_sm;

    // public $model_form = '\App\Forms\BlogForm';
    public $model_form;

    // App\Models\Blog
    public $model_class;

    public $request;

    public $form_builder;

    public $section;

    public $meta = [
        'title' => 'Admin Panel',
        'description' => 'Admin Panel Page For Best Cms In The World',
        'keywords' => '',
        'image' => '',
        'alert' => '',
        'link_route' => '/admin/dashboard',
        'link_name' => 'Dashboard',
        'search' => 0,
    ];

    public function __construct(Request $request, FormBuilder $form_builder)
    {
        if($this->model){
            $this->meta['title'] = __(ucfirst($this->model) . ' Manager');
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
