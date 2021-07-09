# Laravel CMS - Every thing is ready!

## I really love to develop laravel, so I developed everything that needs to be in laravel in this project, Also feel free to contact me on farid.sh69@gmail.com
### Why every time change models you have to write new migration file?
When you change your models based on the old model and new model your table will edit automatically! and if your table is not exist laravel cms will create it for you.
``` bash
php artisan cms:migration
```
With this command, your database tables will all sync with your models, plus forms, api, tables, ... and tests are all ready, just focus on your business ;)
### Why every time change models you have to edit forms, tables, factory, seeder, controllers code?
all form field types are defined and you just need to define what type of field you need for each columns. controller files all ready with a lot of logic codes that is needed for every enterprise projects. you can extend theme and add your logic.
### Why you need to write repeated tests for your models?
Tests are ready for all models, you can change name of your models in config/cms.php
### Why you need to write repeated services like role, permission, log viewer, settings, routes for your new project?
All of neccessary services are ready in this project, just check this code and start to using them.
### Why you need to write repeated codes for your APIs?
List of models that their api is ready is in config/cms.php just check them and be sure your api is ready with authentication.
### Why you dont use services for upload file, blogs with comments, rate, categorize and tag that are ready?
You can't imaging that the best solution for save file is developed in this project, all files will save in storage/public/upload/Your-Model-Name/Model-ID/Model-Column.extention !
For adding tag, category, blog and all neccessery features in all projects like comment, rate, like, share, download image, music, video is ready to use in extendable way.
### Why you need to write structure for your theme?
Theme structure with block and widget is developed in this project and dont hesitate to check resources/front/themes folder.
### Why you are not using laravel CMS? :D
I dont accept any donate, This project is not for money, My main goal is to develope some codes that can help other developers stop developing repeated code and just skip a lot of steps for having a good project. just think about logic.

## Demo

[www.cms-laravel.com](http://www.cms-laravel.com)

[www.cms-laravel.com/document](http://www.cms-laravel.com/document)

[www.cms-laravel.com/admin](http://www.cms-laravel.com/admin)

Check admin panel with username: farid.sh69@gmail.com & password: 1111

Check also settings pages in admin panel to see what you can do to change your project.

##### Laravel CMS is an open source project that creates a complete infrastructure with standard code for anyone who wants to use Laravel. Preparing an structure to make GUI in Laravel development in the future
##### Specify $columns in model then migration, form, seeder, factory, test, admin controller, admin routes, table, api, export to pdf and excel and policies with role and permission will be ready!
##### Prepared services for notification, saving files, creating backup, API authentication, create blogs with comments, rate, categorize and tag, create pages and menus, policies, routes, controllers, and unit tests. Provided structure for adding theme to Laravel project with blocks and modules.


Auto generate:

1. migrations
1. seeders
1. factory
1. routes
1. controller
1. view
1. forms
1. tables
1. export pdf
1. export excel
1. import excel
1. print
1. unit test
1. policies


Admin Controllers:

```php
namespace App\Http\Controllers\Admin\Blog;
use App\Services\BaseListController;
class ResourceController extends BaseListController
{
	public $model = 'Blog';
}
```

Migrations:

```php
use App\Services\BaseMigration;
class CreateBlogsTable extends BaseMigration
{
	public $model = 'Blog';
}
```

Form:

```php
namespace App\Forms;
use App\Services\BaseForm;
class BlogForm extends BaseForm
{
    public $modelName = 'Blog';
}
```


API:

```php
<?php
namespace App\Http\Controllers\Api\V1;
use App\Services\BaseApiController;
class ProductController extends BaseApiController
{
    public $model = 'Product';
}
```

Tests:

```php
namespace Tests\Unit;
use App\Services\BaseTest;
class BlogTest extends BaseTest
{
    public $model = 'Blog';

    public function test()
    {
	$this->resourceTest();
    }
}
```

Policy:

```php
namespace App\Policies;
use App\Services\BasePolicy;
class BlogPolicy extends BasePolicy
{
    public $model = 'Blog';
}
```

Factories always will generated automaticly for seed or unit test

```php
use App\Services\BaseFactory;
$base_factory = new BaseFactory();
$base_factory->index($factory);
```

Model: Just need to define columns array, and let the system handle everything.

```php
public $columns = [
    [
	'name' => 'title',
	'type' => 'string',
	'database' => '',
	'rule' => 'required|max:60|min:5|unique:blogs,title,',
	'help' => 'Title should be unique, minimum 5 and maximum 60 characters.',
	'form_type' => '',
	'table' => true,
    ],
];
```

Setting in Admin Panel

	App Debug
	App Environment
	App Language
	Theme
	Direction

	App Tile
	Logo
	Favicon
	Google Index
	Google Map Code
	Google Analytics
	Hotjar
	Crisp ID
	Email, Phone and other contact informations

	Global Script
	Global Styles
	Throttle
	Seo Parameters to check on data entry
	SMS and Email authentication
	Notification Sending Trigger

	Manage Backup

	Check Logs

	API authentication by OAUTH2


## Used Packages

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

## How to use
	
Define the login of models and database design all in your models.

```php

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
	...
];
```

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

```php

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
```

## Install

``` bash
composer update

php artisan migrate

php artisan db:seed

```

## Usage

``` bash
composer dump-autoload
php artisan clear-compiled
php artisan package:discover

php artisan make:migration create_blogs_table
php artisan make:model Models/Blog
php artisan make:factory BlogFactory
php artisan make:seeder BlogsTableSeeder
php artisan make:controller Api/GeneralController
php artisan make:export BlogsExport --model=Blog
php artisan make:import BlogsImport --model=Blog
php artisan make:mail UserRegistered
php artisan make:test BlogTest --unit
php artisan make:rule SeoHeading
php artisan make:form Forms/BlogForm --fields="title:text, url:text, short_content:textarea, content:textarea, status:checkbox"

php artisan backup:run
php artisan passport:client --password
php artisan passport:install
php artisan apidoc:generate

./vendor/bin/phpunit
./vendor/bin/ecs check app --fix

```


## Demo

[www.cms-laravel.com](http://www.cms-laravel.com)

[www.cms-laravel.com/document](http://www.cms-laravel.com/document)

## Codestyle

Run codestyle:

``` bash
vendor/bin/ecs check app
```


## Create API doc

Create API doc:

``` bash
php artisan apidoc:generate
```

## Testing

Run the tests with:

``` bash
./vendor/bin/phpunit
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Farid Shahidi](http://cms-laravel.com)

## Support us

Faridsh69 is a full stack developer who is trying to prepare usefull codes for developers.

## License

The MIT License (MIT). Please see [License File]() for more information.
