@if(!empty($meta['alert']))
<div class="m-alert alert-info m-alert--icon m-alert--air m-alert--square alert alert-dismissible m--margin-bottom-30" role="alert">
	<div class="m-alert__icon">
		<i class="flaticon-exclamation-1"></i>
	</div>
	<div class="m-alert__text">
		{{ $meta['alert'] }}
	</div>
</div>
@endif