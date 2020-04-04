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
<h2 id="">Use relation in foreach array</h2>
<p>
	When you are using foreach($user->orders as $order) in every time this loop runs it will calculate $user->orders but you need to define it then use it $orders = $user->orders; foreach($orders as $order)
</p>
<h2 id="">Use relation in foreach without using 'with'</h2>
<p>See this code:</p>
<pre>
$orders = \App\Models\User::find($userId)->orders;
foreach($orders as $order)
	$products = $order->products;
	...
</pre>
<p>Now check and run this code:</p>
<pre>
$orders = \App\Models\User::find($userId)->orders->with('products');
foreach($user->orders as $order)
	$products = $order->products;
	...
</pre>
<p>If you are using laravel debugbar package you can see in first model you have just 1 query, but in second one you have n + 1 query ! that is a very serios mistake between laravel developers.</p>
<h2 id="">Auth::user()->id</h2>
<p>
	Its obvious that you need to use Auth::id()
</p>
<h2 id="">Standard restfull api</h2>
<p>
	<a target="blank" href="https://www.youtube.com/watch?v=nSKp2StlS6s"> Video: https://www.youtube.com/watch?v=nSKp2StlS6s</a><br>
	<a target="blank" href="https://dylanbeattie.net/songs/bad_name.html"> Lyric: https://dylanbeattie.net/songs/bad_name.html </a><br>
	There is an video on youtube named you give rest a bad name, I suggest you see it. <br> 
	we need to do this checkpoint list when we are creating api:
	<ol>
		<li>1. We need to name the api standard.</li>
		<li>2. We have to send Json in api response not html, XML, serialized.</li>
		<li>3. Response should be as light as possible, Dont return success => true, and complete data, when you are sending data then no need to send error => false, and such this extra informations.</li>
		<li>4. Api should have version because when you want to change the api version in future you will have some serios problems.</li>
	</ol>
</p>
<h2 id="">Use yield for script and style</h2>
<p>
	We need to define @@stack('style') in layout.header and @@stack('script') in bottom of layout.footer and use @@push('script') to fill it.<br>
	Some developers use yield and it will cause a great limitation to add some script in different blade files. 
</p>

<a target="blank" href="https://github.com/faridsh69/Laravel-CMS">
	<h2 style="color:#48f">Want to see standard code with laravel ? </h2></a>
@endsection