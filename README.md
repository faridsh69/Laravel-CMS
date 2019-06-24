# A modern easy to develope cms for Laravel apps

# [![Latest Stable Version](https://poser.pugx.org/faridsh69/cms/v/stable?format=flat-square)](https://packagist.org/packages/faridsh69/cms)
# [![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
# [![Build Status](https://img.shields.io/travis/faridsh69/cms/master.svg?style=flat-square)](https://travis-ci.org/faridsh69/cms)
# [![Quality Score](https://img.shields.io/scrutinizer/g/faridsh69/cms.svg?style=flat-square)](https://scrutinizer-ci.com/g/faridsh69/cms)
# [![StyleCI](https://styleci.io/repos/30915528/shield)](https://styleci.io/repos/30915528)
# [![Total Downloads](https://img.shields.io/packagist/dt/faridsh69/cms.svg?style=flat-square)](https://packagist.org/packages/faridsh69/cms)

This Laravel package that you should just define an array in each model then every thing will be ready and ofcourse you can change as much as you want.
This array in model make the way easy for automatic create 
	migrations, 
	seeders, 
	factory, 
	routes, 
	controller, 
	view, 
	forms, 
	tables, 
	export pdf, 
	export excel, 
	import excel, 
	print, 
	unit test,
	policies


## How to use
	
	This is an complete model for blogs

	You just need to define what you want from this project !!!
	Define public $columns in each model

	'name': name of column in table and field in inputs and factory and everywhere.
	'type': use for form and migrations that show type of column
	'database': a method that will run affter each migration column like:
		nullable, unique, default(true), unsigned
	'rule': validation after form in update and create
	'help': help block under each field in forms
	'form_type': type of each column, like
		ckeditor, date, email, switch, checkbox, image, textarea, none(for dont show in db)
	'table': boolean that use for show that item in tables
	'relation': used for relation columns just need to define name of table


	This is my array in blog model:

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
        [
            'name' => 'description',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|max:191',
            'help' => 'Description will show in lists instead of content.',
            'form_type' => 'textarea',
            'table' => false,
        ],
        [
            'name' => 'content',
            'type' => 'text',
            'database' => '',
            'rule' => 'required|seo_header',
            'help' => '',
            'form_type' => 'ckeditor',
            'table' => true,
        ], 
        [
            'name' => 'meta_description',
            'type' => 'string',
            'database' => '',
            'rule' => 'required|max:191|min:70',
            'help' => 'Meta description should have minimum 70 and maximum 191 characters.',
            'form_type' => 'textarea',
            'table' => false,
        ],
        [
            'name' => 'keywords',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|max:191',
            'help' => 'Its not important for google anymore',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'meta_image',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|max:191|url',
            'help' => 'Meta image shows when this page is shared in social networks.',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'activated',
            'type' => 'boolean',
            'database' => 'default',
            'rule' => '',
            'help' => '',
            'form_type' => '', // switch-m
            'table' => false,
        ],
        [
            'name' => 'google_index',
            'type' => 'boolean',
            'database' => 'default',
            'rule' => '',
            'help' => 'Google will index this page.',
            'form_type' => 'checkbox',
            'table' => false,
        ],
        [
            'name' => 'canonical_url',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|max:191|url',
            'help' => 'Canonical url just used for seo redirect duplicate contents.',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'category_id',
            'type' => 'bigInteger',
            'database' => 'unsigned',
            'relation' => 'categories',
            'rule' => 'nullable|exists:categories,id',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
    ];


    This is another sample for users table

    public $columns = [
        [
            'name' => 'first_name',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'required|max:100',
            'help' => '',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'last_name',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'required|max:100',
            'help' => '',
            'form_type' => '',
            'table' => true,
        ],
        [
            'name' => 'email',
            'type' => 'string',
            'database' => 'unique',
            'rule' => 'required|unique:users,email,',
            'help' => '',
            'form_type' => 'email',
            'table' => true,
        ],
        [
            'name' => 'mobile',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|numeric|digits_between:5,16',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'phone',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|numeric|digits_between:5,16',
            'help' => '',
            'form_type' => 'none',
            'table' => false,
        ],
        [
            'name' => 'gender',
            'type' => 'boolean',
            'database' => 'default',
            'rule' => '',
            'help' => '',
            'form_type' => 'switch-bootstrap-m',
            'table' => false,
        ],
        [
            'name' => 'birth_date',
            'type' => 'date',
            'database' => 'nullable',
            'rule' => 'nullable|date',
            'help' => '',
            'form_type' => 'date',
            'table' => false,
        ],
        [
            'name' => 'salary',
            'type' => 'integer',
            'database' => 'nullable',
            'rule' => 'nullable|integer',
            'help' => '',
            'form_type' => 'none',
            'table' => false,
        ],
        [
            'name' => 'url',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|max:80|regex:/^[a-z0-9-]+$/|unique:users,url,',
            'help' => 'Url should be unique, contain lowercase characters and numbers and -',
            'form_type' => 'none',
            'table' => false,
        ],
        [
            'name' => 'website',
            'type' => 'string',
            'database' => 'nullable',
            'rule' => 'nullable|url|max:190',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'email_verified_at',
            'type' => 'timestamp',
            'database' => 'nullable',
            'rule' => '',
            'help' => '',
            'form_type' => 'none',
            'table' => false,
        ],
        [
            'name' => 'activated',
            'type' => 'boolean',
            'database' => 'default',
            'rule' => '',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'status',
            'type' => 'tinyInteger',
            'database' => 'nullable',
            'rule' => 'required',
            'help' => '',
            'form_type' => '',
            'table' => false,
        ],
        [
            'name' => 'password',
            'type' => 'string',
            'database' => '',
            'rule' => 'nullable|confirmed|min:3|max:100',
            'help' => 'If you let this field be empty in update password will not change.',
            'form_type' => 'password',
            'table' => false,
        ],
        
    ];



## Used Packages

This CMS used this packages: 

packages:

	+ admin theme: drag and drop, calendar, notification, upload image, chart, forms
		+ kinshines/metronic

	+ form builder:
		+ "kris/laravel-form-builder": "^1.20",

	+ tables: sort, filter, paginate, status activation
		+ "yajra/laravel-datatables-oracle": "~9.0"
		+ datatables.net

	+ HTML editor:
		+ ckeditor4

	+ file manager:
		+ "unisharp/laravel-filemanager": "dev-master",

	+ image: crop, resize, ye url base dashte bashe kolle system, alt axesh
		+ "unisharp/laravel-filemanager": "dev-master",

	+ add tags: for blog
		+ rtconner/laravel-tagging

	+ log:
		+ "rap2hpoutre/laravel-log-viewer": "^1.1",

	+ export excel:
		+ Maatwebsite/Laravel-Excel

	+ import with csv:
		+ Maatwebsite/Laravel-Excel

	+ backup:
		+ spatie/laravel-backup

	+ activity user log ,page and blog view:
		+ "spatie/laravel-activitylog": "^3.5",

	+ validation phone:
		+ Propaganistas/Laravel-Phone

	+ api document:
		+ mpociot/laravel-apidoc-generator

	+ country o city:
		+ antonioribeiro/countries

	+ pdf:
		+ barryvdh/laravel-dompdf

	+ breadcrumb:
		+ myself

	+ meta:
		+ myself

	+ print layout:
		+ myself

	+ seo:
		myself

	+ cdn:
		myself

	lazy :
		myself 

	+ code style:		
		+ symplify/easy-coding-standard

	+ connect to google
		+ laravel/socialite

	+ debugger
		+ barryvdh/laravel-debugbar

	+ api authentication
		+ laravel/passport

	+ module maker:
		nWidart/laravel-modules

	+ role&permission:
		spatie/laravel-permission

	+ captcha
		anhskohbo/no-captcha

	+ category
		+ lazychaser/laravel-nestedset


## Features

	migration:

		https://github.com/faridsh69/cms/blob/master/database/migrations/2014_10_12_000010_create_users_table.php 

		<?php
		use App\Services\MigrationService;
		class CreateUsersTable extends MigrationService
		{
		    public $model = 'User';
		}


	Controller:

		https://github.com/faridsh69/cms/blob/master/app/Http/Controllers/Admin/Blog/ResourceController.php

		<?php
		namespace App\Http\Controllers\Admin\Blog;
		use App\Http\Controllers\Base\ListController;
		class ResourceController extends ListController
		{
			public $model = 'Blog';
		}

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

[faridtest.ir](http://faridtest.ir)

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

- [Farid Shahidi](https://faridshahidi.ir)

## Support us

Faridsh69 is a full stack web and application developer and manager who is trying to prepare usefull packages for developers.

## License

The MIT License (MIT). Please see [License File]() for more information.
