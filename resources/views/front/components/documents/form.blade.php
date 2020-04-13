@extends('front.components.documents.index')
@section('document-data')
<h1>Forms and Fields </h1>
<ul class="service-guide">
	<li><a href="#benefits">Benefits</a></li>
	<li><a href="#how-to-use">How to use</a></li>
	<li><a href="#used-packages">Used Packages</a></li>
	<li><a href="#refrences">Refrences</a></li>
</ul>
<img src="{{ $page->image }}">
<h2 id="benefits">Benefits</h2>
<p>Get familiar with all forms types and use them, all type of form inputs craeted and is ready to develop by laravel-form-builder.</p>
<p>In every project you need to write form and save, edit, show and delete records so we need to have a lot of field types ready to can use them in project, here you go, all type of field defined and just you need to choose which one is suitable for your project.</p>
<h2 id="how-to-use">How to use</h2>
In your models just define 'form_type' in your $columns array and laravel-form-builder will handle every thing.
<h2 id="used-packages">Used Packages</h2>
<pre>
form builder: "kris/laravel-form-builder": "^1.20",
captcha: "anhskohbo/no-captcha"
HTML editor: ckeditor4
</pre>
<h2 id="refrences">Refrences</h2>
<a target="blank" href="https://github.com/faridsh69/Laravel-CMS/blob/master/app/Services/BaseForm.php">Base Form Service</a><br>
<a target="blank" href="https://github.com/faridsh69/Laravel-CMS/blob/master/app/Forms/BlogForm.php">Example: Blog Form</a><br>

@endsection