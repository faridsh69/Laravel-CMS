@extends('front.components.documents.index')
@section('document-data')
<h1>Controllers</h1>
<ul class="service-guide">
	<li><a href="#benefits">Benefits</a></li>
	<li><a href="#how-to-use">How to use</a></li>
	<li><a href="#used-packages">Used Packages</a></li>
	<li><a href="#refrences">Refrences</a></li>
</ul>
<p></p><br>
<img src="{{ $page->image }}">
<h2 id="benefits">Benefits</h2>
<p>Every controller in cms admin is extended from baseListController and every thing will be ready.</p>
<h2 id="how-to-use">How to use</h2>
<p>The aim of this BaseListController is to do every thing by defining $model<br>
Index, Create, Store, Edit, Update, Delete, Restore, Export to pdf, print, Datatable is its functions and in every function it will check the policy and will return appropriate notification.<br>
It will record user activity also and validations run completely. 
</p>
<pre>
// public $model = 'Blog';
public $model;

// public $model_sm = 'blog';
public $model_sm;

// public $model_trans = 'Blog';
public $model_trans;

// public $model_form = '\App\Forms\BlogForm';
public $model_form;

// App\Models\Blog
public $model_class;

// App\Models\Blog
public $model_columns;

public $repository;

public $request;

public $form_builder;

public $meta = [
    'title' => '',
    'description' => 'Admin Panel Page For Full Features, Best UI-UX Cms.',
    'keywords' => '',
    'image' => '/cdn/upload/images/logo.png',
    'alert' => '',
    'link_route' => '/admin',
    'link_name' => 'Dashboard',
    'search' => 0,
];

public function __construct(Request $request, FormBuilder $form_builder)
{
    $this->model_trans = __(strtolower($this->model));
    $this->model_class = 'App\\Models\\' . $this->model;
    $this->model_sm = lcfirst($this->model);
    $this->model_form = 'App\\Forms\\' . $this->model . 'Form';
    $this->repository = new $this->model_class();
    $this->request = $request;
    $this->form_builder = $form_builder;
    $this->model_columns = $this->repository->getColumns();
    if(Route::has('admin.' . $this->model_sm . '.list.index')){
        $this->meta['link_route'] = route('admin.' . $this->model_sm . '.list.index');
    }
    $this->meta['link_name'] = __(strtolower($this->model . '_manager'));
    $this->meta['title'] = __(strtolower($this->model . '_manager'));
}


</pre>
<h2 id="used-packages">Used Packages</h2>
<pre>
form builder: "kris/laravel-form-builder": "^1.20",
tables: "yajra/laravel-datatables-oracle": "~9.0"
export excel: "Maatwebsite/Laravel-Excel"
import with csv: "Maatwebsite/Laravel-Excel"
validation phone: "Propaganistas/Laravel-Phone"
pdf: "barryvdh/laravel-dompdf"
category: "lazychaser/laravel-nestedset"
</pre>
<h2 id="refrences">Refrences</h2>
<a target="blank" href="https://github.com/faridsh69/cms/blob/master/app/Services/BaseListController.php">Base List Controller Service</a><br>
<a target="blank" href="https://github.com/faridsh69/cms/blob/master/app/Http/Controllers/Admin/Blog/ResourceController.php">Example: Blog Resource Controller</a><br>
@endsection