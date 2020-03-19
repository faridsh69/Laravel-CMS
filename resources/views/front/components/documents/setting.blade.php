@extends('front.components.documents.index')
@section('document-data')
<h1>Settings | Backup | Log </h1>
<ul class="service-guide">
	<li><a href="#benefits">Benefits</a></li>
	<li><a href="#how-to-use">How to use</a></li>
	<li><a href="#used-packages">Used Packages</a></li>
	<li><a href="#refrences">Refrences</a></li>
</ul>
<p>Everything is configured in settings at laravel CMS. Feel free to check settings section. </p><br>
<img src="{{ $page->image }}">
<h2 id="benefits">Benefits</h2>
<p>This is list of configures that can be change by admin panel setting section:
<pre>
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
</pre>
</p>
<h2 id="how-to-use">How to use</h2>
use all this commands in your admin panel( not need to have access to shell )
<pre>
$commands = [
[
	'id' => 1,
	'description' => 'recompile classes',
	'command' => 'clear-compiled',
],
[
	'id' => 2,
	'description' => 'recompile packages',
	'command' => 'package:discover',
],
[
	'id' => 3,
	'description' => 'run backup',
	'command' => 'backup:run',
],
[
	'id' => 4,
	'description' => 'create password for passport',
	'command' => 'passport:client --password',
],
[
	'id' => 5,
	'description' => 'install passport',
	'command' => 'passport:install',
],
[
	'id' => 6,
	'description' => 'create a document for api',
	'command' => 'apidoc:generate',
],
[
	'id' => 7,
	'description' => 'show list of routes',
	'command' => 'route:list',
],
[
	'id' => 8,
	'description' => 'recompile config cache',
	'command' => 'config:cache',
],
[
	'id' => 9,
	'description' => 'clear config cache',
	'command' => 'config:clear',
],
[
	'id' => 10,
	'description' => 'run lastest migrations',
	'command' => 'migrate',
],
[
	'id' => 11,
	'description' => 'run seeders',
	'command' => 'db:seed',
],
[
	'id' => 12,
	'description' => 'recompile route cache',
	'command' => 'route:cache',
],
[
	'id' => 13,
	'description' => 'clear route cache',
	'command' => 'route:clear',
],
[
	'id' => 14,
	'description' => 'recompile view cache',
	'command' => 'view:cache',
],
[
	'id' => 15,
	'description' => 'clear view cache',
	'command' => 'view:clear',
],
[
	'id' => 16,
	'description' => 'optimize all configurations',
	'command' => 'optimize',
],
];
</pre>
<h4 id="used-packages">Used Packages</h4>
<pre>
log: "rap2hpoutre/laravel-log-viewer": "^1.1",
api authentication: "laravel/passport"
backup: "spatie/laravel-backup"
</pre>
<h4 id="refrences">Refrences</h4>
<a target="blank" href="https://github.com/faridsh69/cms/blob/master/app/Models/SettingDeveloper.php">Setting Developer</a><br>
<a target="blank" href="https://github.com/faridsh69/cms/blob/master/app/Models/SettingGeneral.php">Setting General</a><br>
<a target="blank" href="https://github.com/faridsh69/cms/blob/master/app/Models/SettingContact.php">Setting Contact</a><br>
@endsection
