@extends('front.components.documents.index')
@section('document-data')
<h1>Laravel Usually Performance Mistakes </h1>
<ul class="service-guide">
	<li><a href="#">Use relation in foreach array</a></li>
	<li><a href="#">Use relation in foreach without using 'with'</a></li>
	<li><a href="#">Auth::user()->id</a></li>
	<li><a href="#">Standard restfull api</a></li>
	<li><a href="#">Use yield for script and style</a></li>
</ul>
<img src="{{ $page->image }}">

<h2> Why every time change models you have to write new migration file? </h2>
<p>
When you change your models based on the old model and new model your table will edit automatically! and if your table is not exist laravel cms will create it for you.
</p>
<h2> Why every time change models you have to edit forms, tables, factory, seeder, controllers code? </h2>
<p>
all form field types are defined and you just need to define what type of field you need for each columns. controller files all ready with a lot of logic codes that is needed for every enterprise projects. you can extend theme and add your logic.
</p>
<h2> Why you need to write repeated tests for your models? </h2>
<p>
Tests are ready for all models, you can change name of your models in config/cms.php
</p>
<h2> Why you need to write repeated services like role, permission, log viewer, settings, routes for your new project? </h2>
<p>
All of neccessary services are ready in this project, just check this code and start to using them.
</p>
<h2> Why you need to write repeated codes for your APIs? </h2>
<p>
List of models that their api is ready is in config/cms.php just check them and be sure your api is ready with authentication.
</p>
<h2> Why you dont use services for upload file, blogs with comments, rate, categorize and tag that are ready? </h2>
<p>
You can't imaging that the best solution for save file is developed in this project, all files will save in storage/public/upload/Your-Model-Name/Model-ID/Model-Column.extention !
For adding tag, category, blog and all neccessery features in all projects like comment, rate, like, share, download image, music, video is ready to use in extendable way.
</p>
<h2> Why you need to write structure for your theme? </h2>
<p>
Theme structure with block and widget is developed in this project and dont hesitate to check resources/front/themes folder.
</p>
<h2> Why you are not using laravel CMS? :D </h2>
<p>
I dont accept any donate, This project is not for money, My main goal is to develope some codes that can help other developers stop developing repeated code and just skip a lot of steps for having a good project. just think about logic.
</p>

<h2> Demo </h2>

<p>
	<a href="http://www.cms-laravel.com">www.cms-laravel.com</a>
	<br>
	<a href="http://www.cms-laravel.com/document">Check document</a>
	<br>
	<a href="http://www.cms-laravel.com/admin">Check admin panel with</a>
	<br>
	username: farid.sh69@gmail.com <br> password: 1111
</p>


@endsection