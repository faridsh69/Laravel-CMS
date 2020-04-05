@extends('admin.common.layout')

@section('content')

<h1>Seo Crwoler</h1>
<hr>
<h4> 
	This is a page that will crowl all pages and find all seo faults!
</h4>
<br>
<a href="{{ route('admin.setting.seo.crowl-run') }}" class="btn btn-success btn-block m-btn m-btn--icon m-btn--air m-btn--pill" >Start
<i class="la la-check"></i></a>
<br>
@if(isset($faults))
<ul style="list-style: none;">
	@foreach($faults as $fault_type => $fault_items)
	<li style="margin-bottom: 15px;">
		<h4> 
			<b>{{ Str::title($fault_type) }}:</b> 
			<br>
			<ul>
				@foreach($fault_items as $fault_item)
				<li style="margin-top: 15px;">
					<small>
						id: {{ $fault_item['id'] }} -
					</small>
					{{ $fault_item['description'] }}
				</li>
				@endforeach
			</ul>
		</h4> 
		<hr>
	</li>
	@endforeach
</ul>
@endif
@endsection