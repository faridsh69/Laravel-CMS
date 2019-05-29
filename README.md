# A modern easy to develope cms for Laravel apps

[![Latest Stable Version](https://poser.pugx.org/faridsh69/cms/v/stable?format=flat-square)](https://packagist.org/packages/faridsh69/cms)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/faridsh69/cms/master.svg?style=flat-square)](https://travis-ci.org/faridsh69/cms)
[![Quality Score](https://img.shields.io/scrutinizer/g/faridsh69/cms.svg?style=flat-square)](https://scrutinizer-ci.com/g/faridsh69/cms)
[![StyleCI](https://styleci.io/repos/30915528/shield)](https://styleci.io/repos/30915528)
[![Total Downloads](https://img.shields.io/packagist/dt/faridsh69/cms.svg?style=flat-square)](https://packagist.org/packages/faridsh69/cms)

This Laravel package make the way easy for writing migrations, seeders, factory, routes, controller, view, forms, tables, export pdf, excel, import, print, ...

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
php artisan backup:run
php artisan make:test BlogTest --unit
php artisan make:rule SeoHeading
php artisan make:form Forms/BlogForm --fields="title:text, url:text, short_content:textarea, content:textarea, status:checkbox"
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

Faridsh69 is a full stack web developer who is trying to make code for help developers.

## License

The MIT License (MIT). Please see [License File]() for more information.
