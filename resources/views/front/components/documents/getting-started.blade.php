@extends('front.components.documents.index')
@section('document-data')
<h1>Getting Started</h1>
<ul class="service-guide">
	<li><a href="#benefits">Benefits</a></li>
	<li><a href="#how-to-use">How to use</a></li>
	<li><a href="#used-packages">Used Packages</a></li>
	<li><a href="#refrences">Refrences</a></li>
</ul>
<p>How to use laravel cms and understand new design patterns that used in this cms. </p><br>
<img src="{{ $page->image }}">
<h2 id="benefits">Benefits</h2>
# Laravel CMS is an open source project that creates a complete infrastructure with standard code for anyone who wants to use Laravel. Preparing an structure to make GUI in Laravel development in the future
<br>
<br>
# Prepared services for notification, saving gallery images, creating backup, API authentication, create blogs with comments, rate, categorize and tag, create pages and menus, policies, routes, controllers, and unit tests. Provided structure for adding theme to Laravel project with blocks and modules.
<br>
<br>
Auto generate:
<pre>
migrations
seeders
factory
routes
controller
view
API
forms
tables
export pdf
export excel
import excel
print
unit test
policies
</pre>
<h2 id="how-to-use">How to use</h2>
Specify $columns in model then migration, form, seeder, factory, test, admin controller, admin routes, table, api, export to pdf and excel and policies with role and permission will be ready!
<br><br>
<pre>
git clone https://github.com/faridsh69/cms.git
composer update
php artisan migrate
php artisan db:seed
</pre>
<h4 id="used-packages">Used Packages</h4>
<pre>
admin theme: "kinshines/metronic"
form builder: "kris/laravel-form-builder": "^1.20",
tables: "yajra/laravel-datatables-oracle": "~9.0"
HTML editor: ckeditor4
file manager: "unisharp/laravel-filemanager": "dev-master",
image: "unisharp/laravel-filemanager": "dev-master",
tags: "rtconner/laravel-tagging"
log: "rap2hpoutre/laravel-log-viewer": "^1.1",
export excel: "Maatwebsite/Laravel-Excel"
import with csv: "Maatwebsite/Laravel-Excel"
backup: "spatie/laravel-backup"
activity user log: "spatie/laravel-activitylog": "^3.5",
validation phone: "Propaganistas/Laravel-Phone"
api document: "mpociot/laravel-apidoc-generator"
country o city: "antonioribeiro/countries"
pdf: "barryvdh/laravel-dompdf"
code style: "symplify/easy-coding-standard"
social networks: "laravel/socialite"
debugger: "barryvdh/laravel-debugbar"
api authentication: "laravel/passport"
module maker: "nWidart/laravel-modules"
role&permission: "spatie/laravel-permission"
captcha: "anhskohbo/no-captcha"
category: "lazychaser/laravel-nestedset"
comment o rate: "actuallymab/laravel-comment"
</pre>
<h2 id="refrences">Refrences</h4>
<a target="blank" href="https://github.com/faridsh69/cms/blob/master/app/Services">Writen Services</a><br>
@endsection
