<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\AdminController;
use Kris\LaravelFormBuilder\FormBuilder;

// use Illuminate\Http\Request;
// use Auth;
// use Conner\Tagging\Model\Tag;
// // use App\Models\Category;
// use Maatwebsite\Excel\Facades\Excel;
// use PDF;

// use App\Models\Blog;
// use App\Forms\BlogForm;
// use App\Exports\BlogsExport;
// use App\Imports\BlogsImport;

class ResourceControllerNew extends AdminController
{
	public $model = 'blog';

	public $form_class = 'App\Forms\BlogForm';

	// public function create(FormBuilder $formBuilder)
	// {
	// 	dd(1);
	// }
}
