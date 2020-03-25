@extends('front.components.documents.index')
@section('document-data')
<h1>Auto gerenate fake data </h1>
<ul class="service-guide">
	<li><a href="#benefits">Benefits</a></li>
	<li><a href="#how-to-use">How to use</a></li>
	<li><a href="#used-packages">Used Packages</a></li>
	<li><a href="#refrences">Refrences</a></li>
</ul>
<img src="{{ $page->image }}">
<h2 id="benefits">Benefits</h2>
<p>Factory is used for seed fake data in database and also it used in tests. factory will generate automatically based on your model columns.</p>
<p>We need to define factory for every models that we have, but in this cms you dont have to do it, because all factories are already created by name and type of your model items.</p>
<h2 id="how-to-use">How to use</h2>
In your models just define 'type' in your $columns array and BaseFactory will generate every thing.<br> if you dont want to factory generate any data of your model you should change it in here:<br>
config.services.models.factory<br>
<pre>
if($name === 'url'){
    $fake_data = 'fake-' . $faker->slug();
}
elseif($name === 'title'){
    $fake_data = $faker->jobTitle();
}
elseif($name === 'description'){
    $fake_data = $faker->realText(100);
}
elseif($name === 'content'){
    $fake_data = "<h1h1><h2h2>" . $faker->realText(400);
}
elseif($form_type === 'file' || $name === 'canonical_url'){
    $fake_data = null;
}
elseif($name === 'keywords'){
    $fake_data = $faker->realText(100);
}
elseif($name === 'icon'){
    $fake_data = $faker->word();
}
elseif($name === 'full_name'){
    $fake_data = $faker->name();
}
elseif($name === 'phone' || $name === 'telephone'){
    $fake_data = '+989120568203';
}
elseif($name === 'national_code'){
    $fake_data = '1270739034';
}
elseif($name === 'postal_code'){
    $fake_data = '18321';
}
elseif($name === 'country'){
    $fake_data = $faker->countryCode();
}
elseif($name === 'province'){
    $fake_data = $faker->state();
}
elseif($name === 'city'){
    $fake_data = $faker->city();
}
elseif($name === 'address'){
    $fake_data = $faker->address();
}
elseif($name === 'latitude'){
    $fake_data = $faker->latitude();
}
elseif($name === 'longitude'){
    $fake_data = $faker->longitude();
}
elseif($name === 'email'){
    $fake_data = $faker->email();
}
elseif($name === 'language'){
    $fake_data = 'en';
}
elseif($name === 'password'){
    $password = $faker->realText(10);
    $fake_data = $password;
}
elseif($database === 'none'){
    continue;
}
elseif($type === 'text'){
    $fake_data = 'Fake ' . $faker->realText(400);
}
elseif($type === 'boolean'){
    $fake_data = 0;
}
elseif($type === '' || $type === 'integer'){
    $fake_data = 1;
}
elseif($type === 'string'){
    $fake_data = 'Fake ' . $faker->realText(20);
}
elseif($type === 'array'){
    $fake_data = [1];
}

</pre>
<h2 id="used-packages">Used Packages</h2>
<pre>
use Faker\Generator as Faker;
</pre>
<h2 id="refrences">Refrences</h2>
<a target="blank" href="https://github.com/faridsh69/Laravel-CMS/blob/master/app/Services/BaseFactory.php">Base Factory</a><br>
<a target="blank" href="https://github.com/faridsh69/Laravel-CMS/blob/master/config/services.php">Config.Services.Models.Factory</a><br>

@endsection