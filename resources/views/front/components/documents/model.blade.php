@extends('front.components.documents.index')
@section('document-data')
<h1>Model Service</h1>
<ul class="service-guide">
	<li><a href="#benefits">Benefits</a></li>
	<li><a href="#how-to-use">How to use</a></li>
	<li><a href="#used-packages">Used Packages</a></li>
	<li><a href="#refrences">Refrences</a></li>
</ul>
<img src="{{ $page->avatar }}">
<h2 id="benefits">Benefits</h2>
<p>How to write your models in cms-laravel, how project will run with just one <b>array</b> in your model, Try to find out why this cms can help to develop more <b>easier</b> and <b>faster</b>.
You want to define columns in model, then develop them in your migrations file, and your forms and all part of your project.<br> When you want to change any column you should search through all your codes and its disgusting,<br> So just define an array about what columns you want in database, forms and table then change it just one time in your model ;)</p>
<h2 id="how-to-use">How to use</h2>
<p>In models we have a $columns array and project is running based on its items, for example we have:
<pre>
class User extends Authenticatable
{
	public $columns = [
	[
		'name' => 'first_name',
		'type' => 'string',
		'database' => 'nullable',
		'rule' => 'required|max:100',
		'help' => 'Write your first name',
		'form_type' => 'text',
		'table' => true,
	],
	[
		'name' => 'gender',
		'type' => 'boolean',
		'database' => 'default',
		'rule' => 'boolean',
		'help' => 'Male of female',
		'form_type' => 'checkbox',
		'table' => false,
	],
</pre>
<p>$column['name']: is used for name of column in database and name of input in form. also it's used in factory for generating fake data.</p>
<p>$column['type']: defines column type in database also its used in factory. check <a target="blank" href="//github.com/faridsh69/cms/blob/master/app/Services/BaseFactory.php"> BaseFactory.php</a>.</p>
<p>$column['database']: is using in database migration function forexample nullable, default, usigned. check <a target="blank" href="//github.com/faridsh69/cms/blob/master/app/Services/BaseMigration.php"> BaseMigration.php</a>.</p>
<p>$column['rule']: is using in forms validation <a target="blank" href="//github.com/faridsh69/cms/blob/master/app/Services/BaseForm.php"> BaseForm.php</a>.</p>
<p>$column['help']: is using in form inputs help, and this cms is using <a target="blank" href="https://github.com/kristijanhusak/laravel-form-builder">laravel-form-builder</a>.</p>
<p>$column['form_type']: is using in form inputs and all type of color, date, time, email, password, file, entity, enum and ckeditor can be selected.</p>
<p>$column['table']: defines that it will show in table or not, this cms is using <a target="blank" href="https://github.com/yajra/laravel-datatables">laravel-datatables</a>.</p>
<table class="table">
	<thead>
		<th>Attribute</th>
		<th>Use</th>
		<th>Example values</th>
	</thead>
	<tbody>
		<tr>
			<td>Name</td>
			<td>Name of column in database.<br>Name of field in form.<br>Used in factory.</td>
			<td>title, description, url, content,<br> full_name, image, language, user_id,<br> category, phone, address, email, password</td>
		</tr>
		<tr>
			<td>Type</td>
			<td>Type of column in database.<br>Used in factory.</td>
			<td><code>string, text, boolean, <br>integer, bigInteger, tinyInteger, unsignedBigInteger,<br> array, decimal, float, file, date, time, timestamp</code></td>
		</tr>
		<tr>
			<td>Database</td>
			<td>properties of column in database.</td>
			<td><code>nullable, unsigned, unique, default, none</code></td>
		</tr>
		<tr>
			<td>Rule</td>
			<td>Rules for store and edit data.</td>
			<td><code>required, nullable, image, max:190,<br> min:3, unique, boolean, exists:users,id,<br> numeric, file|image|mimetypes:image/*</code></td>
		</tr>
		<tr>
			<td>Help</td>
			<td>Help block in forms.</td>
			<td>Title should be unique and must not be same with H1.</td>
		</tr>
		<tr>
			<td>Form Type</td>
			<td>Define type of input in form.</td>
			<td><code>textarea, ckeditor, entity, checkbox,<br> enum, color, date, time, switch,<br> password, email, file, number, none</code></td>
		</tr>
		<tr>
			<td>Table</td>
			<td>Show field in table or not.</td>
			<td><code>true, false</code></td>
		</tr>		
	</tbody>
</table>
<p>You dont need to define all of this properties again and again, just for usual columns write the name of columns and other parts with autogenerate.</p>
<pre>
class Blog extends App\Services\BaseModel
{
	public $columns = [
		['name' => 'title'],
		['name' => 'url'],
		['name' => 'description'],
		['name' => 'content'],
		['name' => 'keywords'],
		['name' => 'image'],
		['name' => 'activated'],
		['name' => 'google_index'],
		['name' => 'canonical_url']
	];
}
</pre>
<p>Blog model is just this and alot of developments for creating migration, seeder, faker and form is skiped! <br>Just test it you would love it.</p>
<h2 id="used-packages">Used Packages</h2>
<pre>
form builder: "kris/laravel-form-builder": "^1.20",
tables: "yajra/laravel-datatables-oracle": "~9.0"
</pre>
<h2 id="refrences">Refrences</h2>
<a href="https://github.com/faridsh69/Laravel-CMS/blob/master/app/Services/BaseModel.php">BaseModel.php</a><br>
<a href="https://github.com/faridsh69/Laravel-CMS/blob/master/app/Models/Blog.php">Models/Blog.php</a>
@endsection





