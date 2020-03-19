@extends('front.components.documents.index')
@section('document-data')
<h1>Seeder</h1>
<ul class="service-guide">
	<li><a href="#benefits">Benefits</a></li>
	<li><a href="#how-to-use">How to use</a></li>
	<li><a href="#used-packages">Used Packages</a></li>
	<li><a href="#refrences">Refrences</a></li>
</ul>
<p></p><br>
<img src="{{ $page->image }}">
<h2 id="benefits">Benefits</h2>
<p>Seeder is for testing some structure and see that if user wants to if he add some data and show them in system, then every thing is working or not. here autogerenated seeders are existed to use.</p>
<h2 id="how-to-use">How to use</h2>
<p>You dont need to write any seeders, just add models that you want to seed fake data to config/services.php file.<br>
When you have no records in your table and if your model name existed in config.services.models.seeders then it will generate 5 fake data and will seed to your database.</p>
<h2 id="used-packages">Used Packages</h2>
<pre>
use Faker\Generator as Faker;
</pre>
<h2 id="refrences">Refrences</h2>
<a target="blank" href="https://github.com/faridsh69/cms/blob/master/app/Services/BaseSeeder.php">Base Seeder Service</a><br>
<a target="blank" href="https://github.com/faridsh69/cms/blob/master/database/seeds/DatabaseSeeder.php">DatabaseSeeder.php</a><br>


@endsection