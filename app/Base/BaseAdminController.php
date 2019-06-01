<?php

namespace App\Base;

use App\Http\Controllers\Controller;
use Auth;
use Conner\Tagging\Model\Tag;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use View;

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

    public $meta = [
        'title' => 'Admin Panel',
        'description' => 'Admin Panel Page For Best Cms In The World',
        'keywords' => '',
        'image' => '',
        'alert' => 'Advanced form with validation, ckeditor, multiselect, swith... !',
        'link_route' => '/',
        'link_name' => 'Dashboard',
        'search' => 0,
    ];

    public function __construct(Request $request, FormBuilder $form_builder)
    {
        $this->model_class = 'App\\Models\\' . $this->model;
        $this->model_sm = lcfirst($this->model);
        $this->model_form = 'App\\Forms\\' . $this->model . 'Form';
        $this->request = $request;
        $this->form_builder = $form_builder;
    }
}
