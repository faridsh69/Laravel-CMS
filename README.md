# Laravel CMS

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

## Laravel CMS is an open source project that creates a complete infrastructure with standard code for anyone who wants to use Laravel. Preparing an structure to visualization Laravel development in the future:

### Specify columns in model => migration, form, seeder, factory, table, api, export to pdf and excel will be ready with complete admin panel codes!

#### Prepared services for notification, saving gallery images, creating backup, API authentication, create blogs with comments, rate, categorize and tag, create pages and menus, policies, routes, controllers, and unit tests.

#### Provided structure for adding theme to Laravel project with blocks and widgets.


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


Controller sample code:

```php
namespace App\Http\Controllers\Admin\Blog;
use App\Base\BaseListController;
class ResourceController extends BaseListController
{
	public $model = 'Blog';
}
```

Migrations:

```php
use App\Base\BaseMigration;
class CreateBlogsTable extends BaseMigration
{
public $model = 'Blog';
}
```

Tests:

```php
namespace Tests\Unit;
use App\Base\BaseTest;
class BlogTest extends BaseTest
{
    public $model = 'Blog';

    public function test()
    {
	$this->resourceTest();
    }
}
```

RouteServiceProvider

```php
public function map()
{
    $this->mapAdminRoutes();
    $this->mapApiRoutes();
    $this->mapAuthRoutes();
    $this->mapFrontRoutes();
}
```

Factories always will generated automaticly for seed or unit test

```php
use App\Base\BaseFactory;
$base_factory = new BaseFactory();
$base_factory->index($factory);
```

Form:

```php
namespace App\Forms;
use App\Base\BaseForm;
class BlogForm extends BaseForm
{
    public $model_name = 'Blog';
}
```

Policy: (You can ovveride any functions that you want to customise)

```php
namespace App\Policies;
use App\Base\BasePolicy;
class BlogPolicy extends BasePolicy
{
    public $model = 'Blog';
}
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
    .
    .
    .
];
```

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
	
You just need to define what you want from this project !!!
Define public $columns in each model

'name': name of column in table and field in inputs and factory and everywhere.
'type': use for form and migrations that show type of column
'database': a method that will run affter each migration column like:
`nullable, unique, default(true), unsigned`
'rule': validation after form in update and create
'help': help block under each field in forms
'form_type': type of each column, like
`ckeditor, date, email, switch, checkbox, image, textarea, none(for dont show in db)`
'table': boolean that use for show that item in tables
'relation': used for relation columns just need to define name of table


This is my array in blog model:

```php
public $columns = [
[
    'name' => 'title',
    'type' => 'string',
    'database' => 'unique',
    'rule' => 'required|max:60|min:10|unique:blogs,title,',
    'help' => 'Title should be unique, minimum 10 and maximum 60 characters.',
    'form_type' => '',
    'table' => true,
],
[
    'name' => 'url',
    'type' => 'string',
    'database' => 'unique',
    'rule' => 'required|max:80|regex:/^[a-z0-9-]+$/|unique:blogs,url,',
    'help' => 'Url should be unique, contain lowercase characters and numbers and -',
    'form_type' => '',
    'table' => true,
],
];
```



## Features

migration:

https://github.com/faridsh69/cms/blob/master/database/migrations/2014_10_12_000010_create_users_table.php 

```php
use App\Services\MigrationService;
class CreateUsersTable extends MigrationService
{
    public $model = 'User';
}

```
Controller:

https://github.com/faridsh69/cms/blob/master/app/Http/Controllers/Admin/Blog/ResourceController.php

```php
namespace App\Http\Controllers\Admin\Blog;
use App\Http\Controllers\Base\ListController;
class ResourceController extends ListController
{
	public $model = 'Blog';
}
```

Seeders:

Factory:

Unittest:

...

## Install

``` bash
composer update

php artisan migrate

php artisan db:seed

./vendor/bin/phpunit
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
```


## Demo

[www.cms-laravel.com](http://www.cms-laravel.com)

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
