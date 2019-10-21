@extends('layout.admin')
@push('style')
<style>
	.seo-rules li{
		margin-bottom: 20px;
		list-style: none;
	}
</style>
@endpush
@section('content')

<h1 class="page-header">
	Content Rules
</h1>
<hr>
<ol class="seo-rules">
	<li>
		<h4> 
			<b>Title:</b> 
			<br>
			<p><small>
				required|min:{{config('0-developer.seo_title_min')}}|max:{{config('0-developer.seo_title_max')}}
			</small></p>
			<a href="{{ route('admin.setting.developer') }}#scripts" class="btn btn-info btn-sm m-btn m-btn--icon m-btn--air m-btn--pill" target="_blank">
				<i class="la la-edit"></i>Edit</a>
		</h4> 
		<hr>
	</li>
	<li>
		<h4> 
			<b>Url:</b> 
			<br>
			<p><small>
				nullable|max:{{config('0-developer.seo_url_max')}}|regex:{{config('0-developer.seo_url_regex')}}
			</small></p>
			<a href="#" class="btn btn-info btn-sm m-btn m-btn--icon m-btn--air m-btn--pill">
				<i class="la la-edit"></i>Edit</a>
		</h4> 
		<hr>
	</li>
	<li>
		<h4> 
			<b>Meta Description:</b> 
			<br>
			<p><small>
				required|min:50|max:155
			</small></p>
		</h4>
		<hr>
	</li>
	<li>
		<h4> 
			<b>Content:</b> 
			<br>
			<p><small>
				required|only 1 H1, atleast 1 H2  
			</small></p>
		</h4>
		<hr>
	</li>
	<li>
		<h4> 
			<b>Canonical Url:</b> 
			<br>
			<small>
				Needed for duplicate content
			</small>
		</h4>
		<hr>
	</li>
	<li>
		<h4> 
			<b>Meta OG & TWITTER Tags:</b> 
			<br>
			<small>
				full meta OG and TWITTER meta tags in all pages
			</small>
		</h4>
		<hr>
	</li>
	<!-- <li>
		<h4> 
			Find h1 only one in all content of pages and blogs, and minimmum two h2 tags.
		</h4> 
	</li> -->
	<!-- <li>
		<h4> 
			Use full meta OG and TWITTER meta tags in all pages.
		</h4> 
	</li> -->
	<!-- <li>
		<h4> 
			Use canonical link for google new principles.
		</h4> 
	</li> -->
	<!-- <li>
		<h4> 
			Validations in url: 
			<br>
			<small>
				required|min:10|max:80|lowercase|alphabetic
			</small>
		</h4> 
	</li> -->
	<!-- <li>
		<h4> 
			Validations in title: 
			<br>
			<small>
				required|unique:blogs,title|min:10|max:60
			</small>
		</h4> 
	</li> -->
	<!-- <li>
		<h4> 
			Validations in meta description: 
			<br>
			<small>
				required|min:70|max:190
			</small>
		</h4> 
	</li> -->
</ol>
<br>
@endsection

