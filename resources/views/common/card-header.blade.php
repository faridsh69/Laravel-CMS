<div class="m-portlet__head">
	<div class="m-portlet__head-caption">
		<div class="m-portlet__head-title">
			<h3 class="m-portlet__head-text">
				{{ $meta['title'] }}
				<small>
				</small>
				<a href="{{ $meta['link_route'] }}" class="btn btn-info btn-sm m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
					<span>
						<i class="la la-hand-o-right"></i>
						<span>
							{{ $meta['link_name'] }}
						</span>
					</span>
				</a>
			</h3>
		</div>
	</div>
	@if(true) @include('common.table-search') @endif
	@if(true) @include('common.header-tools') @endif
</div>