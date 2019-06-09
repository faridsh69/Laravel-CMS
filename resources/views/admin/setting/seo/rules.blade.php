@extends('layout.admin')

@section('content')

<h1 class="page-header">
	Content Rules
</h1>
<br>
<ul>
	<li>
		<h4> 
			Find h1 only one in all content of pages and blogs, and minimmum two h2 tags.
		</h4> 
	</li>
	<li>
		<h4> 
			Use full meta OG and TWITTER meta tags in all pages.
		</h4> 
	</li>
	<li>
		<h4> 
			Use canonical link for google new principles.
		</h4> 
	</li>
	<li>
		<h4> 
			Validations in url: 
			<br>
			<small>
				required|min:10|max:80|lowercase|alphabetic
			</small>
		</h4> 
	</li>
	<li>
		<h4> 
			Validations in title: 
			<br>
			<small>
				required|unique:blogs,title|min:10|max:60
			</small>
		</h4> 
	</li>
	<li>
		<h4> 
			Validations in meta description: 
			<br>
			<small>
				required|min:70|max:190
			</small>
		</h4> 
	</li>
</ul>
<br>
<br>
<br>
@endsection

