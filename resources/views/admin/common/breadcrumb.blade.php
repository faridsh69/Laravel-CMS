<div class="mr-auto">
	<h3 class="m-subheader__title m-subheader__title--separator">
		{{ $meta['title'] }}
	</h3>
	<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
		<li class="m-nav__item m-nav__item--home">
			<a href="{{ url('/') }}" class="m-nav__link m-nav__link--icon">
				<i class="m-nav__link-icon la la-home"></i>
			</a>
		</li>
		@foreach(Request::segments() as $key => $segment)
		@php
			if(!isset($url)){
				$url = '';
			}

			$url .= $segment . '/';
		@endphp
		<li class="m-nav__separator">
			-
		</li>
		<li class="m-nav__item">
			<a href="{{ url('/' . $url) }}" class="m-nav__link">
				<span class="m-nav__link-text">
					{{ __($segment) }}
				</span>
			</a>
		</li>
		@endforeach
	</ul>
</div>
	