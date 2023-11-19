@extends('front.components.documents.index')
@section('document-data')
<h1>Automatic Migration </h1>
<ul class="service-guide">
	<li><a href="#benefits">Benefits</a></li>
	<li><a href="#how-to-use">How to use</a></li>
	<li><a href="#used-packages">Used Packages</a></li>
	<li><a href="#refrences">Refrences</a></li>
</ul>
<img src="{{ $page->avatar }}">
<h2 id="benefits">Benefits</h2>
<p>How to use migration service to create or modify tables based on model changes. </p>
<p>You need to change migration every time to want to change your model but here base on the model columns migration file will run automatically, because of some special columns like latitude and longitude you can add some extra codes to BaseMigration to run migration by your thoughts.</p>
<h2 id="how-to-use">How to use</h2>
In migration define the $model and $rebuild, if $rebuild is true then that table will be droped and migrate again, before drop that table automatically it will create a backup of that table to dont loos your data
<h2 id="used-packages">Used Packages</h2>
<pre>
activity user log: "spatie/laravel-activitylog": "^3.5",
role&permission: "spatie/laravel-permission"
comment o rate: "actuallymab/laravel-comment"
</pre>
<h2 id="refrences">Refrences</h2>
<a target="blank" href="https://github.com/faridsh69/Laravel-CMS/blob/master/app/Services/BaseMigration.php">Base Migration Service</a><br>
<a target="blank" href="https://github.com/faridsh69/Laravel-CMS/blob/master/database/migrations/2019_05_10_105731_create_blogs_table.php">Example: Blog Migration</a><br>

@endsection